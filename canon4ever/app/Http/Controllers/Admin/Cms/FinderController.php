<?php

namespace App\Http\Controllers\Admin\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinderController extends Controller
{
    function index()
    {
        return view('cms.finder.index');
    }
}
