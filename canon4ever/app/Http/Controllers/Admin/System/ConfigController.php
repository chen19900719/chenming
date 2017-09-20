<?php

namespace App\Http\Controllers\Admin\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\System\Config;

class ConfigController extends Controller
{
    /**
     * 显示系统设置
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function edit()
    {
        $config = Config::find(1);
        return view('admin.system.config.edit', compact('config'));
    }

    /**
     * 更新系统设置
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(Request $request)
    {
        $config = Config::find(1);
        $config->update($request->all());
        return back()->with('notice', '修改成功~');
    }
}
