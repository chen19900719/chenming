<?php

namespace App\Http\Controllers\Admin\Crm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    /**
     * 客户管理首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index()
    {
        return view('admin.crm.index');
    }
}
