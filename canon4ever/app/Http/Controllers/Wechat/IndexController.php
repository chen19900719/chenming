<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ads\Ad, App\Models\Shop\Product;

use App\Http\Requests;

class IndexController extends Controller
{
    function index()
    {
        $slides = Ad::where('category_id', '1')->orderBy("sort_order")->get();
        $banners = Ad::where('category_id', '2')->orderBy("sort_order")->get();
        $recommends = Product::where('is_recommend', true)->orderBy('is_top', 'desc')->orderBy('sort_order')->get();
        return view('wechat.index', compact('slides', 'banners', 'recommends'));
    }
}
