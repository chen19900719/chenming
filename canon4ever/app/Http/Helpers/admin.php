<?php
/**
 * 截取, 并加上...
 * @param $string
 * @param $size
 * @param bool $dot 是否加上..., 默认true
 * @return string
 */
function sub($string, $size = 24, $dot = true)
{
    $string = strip_tags(trim($string));
    if (strlen($string) > $size) {
        $string = mb_substr($string, 0, $size);
        $string .= $dot ? '...' : '';
        return $string;
    }

    return $string;
}

/**
 * 递归生成无限极分类数组
 * @param $data
 * @param int $parent_id
 * @param int $count
 * @return array
 */
function tree(&$data, $parent_id = 0, $count = 1)
{
    static $treeList = [];

    foreach ($data as $key => $value) {
        if ($value['parent_id'] == $parent_id) {
            $value['count'] = $count;
            $treeList [] = $value;
            unset($data[$key]);
            tree($data, $value['id'], $count + 1);
        }
    }
    return $treeList;
}

/**
 * 栏目名前面加上缩进
 * @param $count
 * @return string
 */
function indent_category($count)
{
    $str = '';
    for ($i = 1; $i < $count; $i++) {
        $str .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    return $str;
}

/**
 * 订单状态
 * @param $status
 * @return mixed
 */
function order_status($status)
{
    $info = config('admin.order_status');
    return $info["$status"];
}

/**
 * 1=> '下单',       //待支付
 * 2=> '付款',       //待发货
 * 3=> '配货',
 * 4=> '出库',       //待收货
 * 5=> '交易成功',    //已完成
 */
function order_color($status)
{
    switch ($status) {
        case '1':
            return 'uc-order-item-pay';         //橙
            break;
        case '2':
            return 'uc-order-item-shipping';    //红
            break;
        case '3':
            return 'uc-order-item-shipping';    //红
            break;
        case '4':
            return 'uc-order-item-receiving';   //绿
            break;
        case '5':
            return 'uc-order-item-finish';      //灰
            break;
        default:
            return 'uc-order-item-finish';
    }
}


//是否...
function is_something($attr, $module)
{
    return $module->$attr ? '<span class="am-icon-check is_something" data-attr="' . $attr . '"></span>' : '<span class="am-icon-close is_something" data-attr="' . $attr . '"></span>';
}

//显示栏目对应文章
function show_articles($category)
{
    if ($category->type == 2) {
        return '<a class="am-badge am-badge-secondary" href="' . route('cms.article.index', ['category_id' => $category->id]) . '">查看栏目文章</a>';
    }
}

//显示分类对应商品
function show_category_products($category)
{
    if (!$category->products->isEmpty()) {
        return '<a class="am-badge am-badge-secondary" href="' . route('shop.product.index', ['category_id' => $category->id]) . '">查看商品</a>';
    }
}

function show_brand_products($brand)
{
    if (!$brand->products->isEmpty()) {
        return '<a class="am-badge am-badge-secondary" href="' . route('shop.product.index', ['brand_id' => $brand->id]) . '">查看商品</a>';
    }
}


//栏目类型
function type($type)
{
    switch ($type) {
        case 1:
            return '<a class="am-badge am-badge-primary am-radius">封面</a>';
            break;
        case 2:
            return '<a class="am-badge am-badge-success am-radius">列表</a>';
            break;
        default:
            return '<a class="am-badge am-badge-warning am-radius">跳转</a>';
    }
}

function time_format($attr, $datetime)
{
    if ($datetime == "") {
        return "";
    }
    return date($attr, strtotime($datetime));
}

/**
 * 微信菜单, 删除空数组
 * @param $buttons
 */
function wechat_menus($request_buttons)
{
    $buttons = [];

    foreach ($request_buttons as $key => $value) {
        if ($value['name'] == "") {
            continue;
        }

        $buttons["$key"] = wechat_key_url($value);

        foreach ($value["sub_button"] as $k => $v) {
            if ($v['name'] == "") {
                continue;
            }
            $buttons["$key"]["sub_button"][] = wechat_key_url($v);
        }
    }
    return $buttons;
}

/**
 * 根据类型,返回url或者key
 * @param $value
 * @return array
 */
function wechat_key_url($value)
{
    $result = [];

    $result['type'] = $value['type'];
    $result['name'] = $value['name'];
    if ($value['type'] == "click") {
        $result['key'] = $value['value'];
    } else {
        $result['url'] = $value['value'];
    }
    return $result;
}

function category_indent($count)
{
    $str = '';
    for ($i = 0; $i < $count; $i++) {
        $str .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    return $str;
}


//生成image标签的其他属性
function build_image_attributes($attributes)
{
    $attributes_html = '';
    if ($attributes) {
        foreach ($attributes as $key => $value) {
            $attributes_html .= $key . '= "' . $value . '"';
        }
    }
    return $attributes_html;
}

/**
 * 原始图片
 * @param $model
 * @param string $class
 * @param string $alt
 * @return string
 */
function image_url($model, $attributes = [])
{
    $attributes_html = build_image_attributes($attributes);
    if ($model->image) {
        return ' <img src="' . env('QINIU_IMAGES_LINK') . $model->image . '" ' . $attributes_html . '>';
    }
}

/**
 * thumb缩略图
 * @param $model
 * @param string $class
 * @param string $alt
 * @return string
 */
function thumb_url($model, $attributes = [])
{
    $attributes_html = build_image_attributes($attributes);
    if ($model->image) {
        return ' <img src="' . env('QINIU_IMAGES_LINK') . $model->image . '-thumb' . '" ' . $attributes_html . '>';
    }
}

/**
 * medium 缩略图
 * @param $model
 * @param string $class
 * @param string $alt
 * @return string
 */
function large_url($model, $attributes = [])
{
    $attributes_html = build_image_attributes($attributes);
    if ($model->image) {
        return ' <img src="' . env('QINIU_IMAGES_LINK') . $model->image . '-large' . '" ' . $attributes_html . '>';
    }
}
