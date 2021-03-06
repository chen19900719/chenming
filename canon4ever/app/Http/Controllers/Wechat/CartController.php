<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\Cart;

class CartController extends Controller
{
    /**
     * 购物车列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index()
    {
        $carts = Cart::with('product')->where('customer_id', session('wechat.customer.id'))->get();
        $count = Cart::count_cart($carts);
        return view('wechat.cart.index', compact('carts', 'count'));
    }

    /**
     * 添加商品到购物车
     * @param Request $request
     * @return array|void
     */
    function store(Request $request)
    {
        //判断购物车是否有当前商品,如果有,那么 num +1
        $product_id = $request->product_id;
        $cart = Cart::where('product_id', $product_id)->where('customer_id', session('wechat.customer.id'))->first();


        if ($cart) {
            Cart::where('id', $cart->id)->increment('num');
            return;
        }

        //否则购物车表,创建新数据
        Cart::create([
            'product_id' => $request->product_id,
            'customer_id' => session('wechat.customer.id'),
        ]);

    }

    /**
     * 修改购物车商品数量
     * @param Request $request
     * @return array
     */
    function change_num(Request $request)
    {
        if ($request->type == 'add') {
            Cart::where('id', $request->id)->increment('num');
        } else {
            Cart::where('id', $request->id)->decrement('num');
        }
        return Cart::count_cart();
    }

    /**
     * 删除
     * @param Request $request
     * @return array
     */
    function destroy(Request $request)
    {
        $id = $request->id;
        Cart::destroy($id);
        return Cart::count_cart();
    }
}