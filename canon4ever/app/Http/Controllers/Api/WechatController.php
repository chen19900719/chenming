<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use EasyWeChat\Message\Text;
use EasyWeChat\Message\News;

use App\Models\Shop\Product, App\Models\Shop\Order, App\Models\Shop\Customer;
use EasyWeChat;

use EasyWeChat\Message\Raw;


class WechatController extends Controller
{
    /**
     * 微信回复消息接口
     * @return mixed
     */
    public function serve()
    {
        // 从项目实例中得到服务端应用实例。
        $server = EasyWeChat::server();

        $server->setMessageHandler(function ($message) {

            //事件处理
            if ($message->MsgType == 'event') {
                switch ($message->Event) {
                    //关注事件
                    case 'subscribe':
                        return new Text(['content' => '欢迎关注 武汉长乐未央教育! 亲, 还在等什么, 赶紧去长乐小卖部买东西啊~']);
                        break;

                    //点击事件
                    case 'CLICK':
                        switch ($message->EventKey) {
                            case 'recommend':
                                return $this->is_recommend();
                                break;

                            case 'new':
                                return $this->is_new();
                                break;

                            case 'hot':
                                return $this->is_hot();
                                break;

                            case 'order':
                                return $this->order($message->FromUserName);
                                break;
                        }
                        break;
                }
            }

            //文本消息
            if ($message->MsgType == 'text') {
                switch ($message->Content) {
                    case '精选':
                    case '推荐':
                    case '精选推荐':
                    case 'recommend':
                        return $this->is_recommend();
                        break;

                    case '新品':
                    case '新品到货':
                    case 'new':
                        return $this->is_new();
                        break;

                    case '人气':
                    case '热卖':
                    case '人气热卖':
                    case 'hot':
                        return $this->is_hot();
                        break;

                    case '我的订单':
                    case '订单':
                    case 'order':
                        return $this->order($message->FromUserName);
                        break;

                    default:
                        return $this->default_msg();
                }
            }

            //语音消息
            if ($message->MsgType == 'voice') {
                switch ($message->Recognition) {
                    case '精选。':
                    case '推荐。':
                    case '精选推荐。':
                        return $this->is_recommend();
                        break;

                    case '新品。':
                    case '新品到货。':
                        return $this->is_new();
                        break;

                    case '人气。':
                    case '热卖。':
                    case '人气热卖。':
                        return $this->is_hot();
                        break;

                    case '订单。':
                    case '我的订单。':
                        return $this->order($message->FromUserName);
                        break;

                    default:
                        return '您说的是:' . $message->Recognition . '?';
                }
            }
        });

        return $server->serve();
    }


    /**
     * 精选推荐
     * @return array
     */
    private function is_recommend()
    {
        $products = Product::where('is_recommend', true)
            ->orderBy('is_top', "desc")
            ->orderBy('created_at')
            ->take(6)
            ->get();

        $news = [];
        foreach ($products as $p) {
            $news[] = new News([
                'title' => $p->name,
                'description' => $p->desc,
                'url' => 'http://' . env('WECHAT_DOMAIN') . '/product/' . $p->id,
                'image' => $p->image ? env('QINIU_IMAGES_LINK') . $p->image : '',
            ]);
        }
        return $news;
    }

    /**
     * 人气热卖
     * @return array
     */
    private function is_hot()
    {
        $products = Product::where('is_hot', true)
            ->orderBy('is_top', "desc")
            ->orderBy('created_at')
            ->take(6)
            ->get();

        $news = [];
        foreach ($products as $p) {
            $news[] = new News([
                'title' => $p->name,
                'description' => $p->desc,
                'url' => 'http://' . env('WECHAT_DOMAIN') . '/product/' . $p->id,
                'image' => $p->image ? env('QINIU_IMAGES_LINK') . $p->image : '',
            ]);
        }
        return $news;
    }

    /**
     * 新品
     * @return array
     */
    private function is_new()
    {
        $products = Product::where('is_new', true)
            ->orderBy('is_top', "desc")
            ->orderBy('created_at')
            ->take(6)
            ->get();

        $news = [];
        foreach ($products as $p) {
            $news[] = new News([
                'title' => $p->name,
                'description' => $p->desc,
                'url' => 'http://' . env('WECHAT_DOMAIN') . '/product/' . $p->id,
                'image' => $p->image ? env('QINIU_IMAGES_LINK') . $p->image : '',
            ]);
        }
        return $news;
    }

    /**
     * 我的订单
     * @param $openid
     * @return array|string
     */
    function order($openid)
    {
        $customer = Customer::where('openid', $openid)->first();

        //如果用户还不存在,直接返回
        if (!$customer) {
            return '你没有未完成的订单, 马上去购物吧~';
        }

        $order_status = config('admin.order_status');
        $orders = Order::where('status', '<', 5)
            ->where('customer_id', $customer->id)
            ->with('order_products.product')
            ->orderBy('status')
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();

        if ($orders->isEmpty()) {
            return '你没有未完成的订单, 马上去购物吧~';
        }

        $news = [];
        foreach ($orders as $order) {
            $news[] = new News([
                'title' => '订单号' . $order->id . " (" . $order_status[$order->status] . ")",
                'url' => 'http://' . env('WECHAT_DOMAIN') . '/order/' . $order->id,
                'image' => $order->order_products->first()->product->image ? env('QINIU_IMAGES_LINK') . $order->order_products->first()->product->image : '',
            ]);
        }
        return $news;
    }

    /**
     * 默认消息
     * @return string
     */
    function default_msg()
    {
        return '有趣的问题~';
    }
}