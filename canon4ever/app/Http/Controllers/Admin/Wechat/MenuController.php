<?php

namespace App\Http\Controllers\Admin\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Cache;
use EasyWeChat\Core\Exceptions\HttpException;
use EasyWeChat;

class MenuController extends Controller
{
    private $menu;

    public function __construct()
    {
        $this->menu = EasyWeChat::menu();
    }

    /**
     * 编辑微信菜单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function edit()
    {
        try {
            $buttons = Cache::rememberForever('wechat_config_menus', function () {
                $menus = $this->menu->all();
                return $menus->menu['button'];
            });
        } catch (HttpException $e) {
            $buttons = [];
        }

        return view('admin.wechat.menu.edit', compact('buttons'));
    }

    /**
     * 更新微信菜单
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(Request $request)
    {
        $buttons = wechat_menus($request->buttons);
        $this->menu->add($buttons);
        Cache::forget('wechat_config_menus');
        return back()->with('notice', '您已成功设置菜单，请取消关注后，再重新关注~');
    }

    /**
     * 删除微信菜单
     * @return \Illuminate\Http\RedirectResponse
     */
    function destroy()
    {
        $this->menu->destroy();
        Cache::forget('wechat_config_menus');
        return back()->with('notice', '您已成功删除菜单，请取消关注后，再重新关注~');
    }
}
