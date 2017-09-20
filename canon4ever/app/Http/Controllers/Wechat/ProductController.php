<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Shop\Product, App\Models\Shop\Category;

class ProductController extends Controller
{
    function category()
    {
        $categories = Category::get_categories();
        return view('wechat.product.category')->with('categories', $categories);
    }

    /**
     * 商品列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('category_id') and $request->category_id != '') {
                $category_id = $request->category_id;
                $product_ids = \DB::table('category_product')->where('category_id', $category_id)->pluck('product_id');

                $query->whereIn('id', $product_ids);
            }

            if ($request->has('searchword')) {
                if ($request->has('searchword') and $request->searchword != '') {
                    $search = "%" . $request->searchword . "%";
                    $query->where('name', 'like', $search);
                }
            }
        };

        $products = Product::where($where)
            ->orderBy('is_top', "desc")->orderBy('created_at')
            ->get();

        return view('wechat.product.index', compact('products'));
    }

    /**
     * 显示
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function show($id)
    {
        $product = Product::find($id);
        $recommends = Product::where('is_recommend', true)->where('id', '<>', $id)
            ->orderBy('is_top', 'desc')->get();

        return view('wechat.product.show', compact('product', 'recommends'));
    }

    /**
     * 搜索
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function search()
    {
        $products = Product::where('is_recommend', true)
            ->orderBy('is_top', "desc")
            ->orderBy('created_at')
            ->get();
        return view('wechat.product.search', compact('products'));
    }
}