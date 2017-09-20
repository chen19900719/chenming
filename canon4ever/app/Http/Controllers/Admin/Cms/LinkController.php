<?php

namespace App\Http\Controllers\Admin\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cms\Link;

class LinkController extends Controller
{
    /**
     * 首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(Request $request)
    {
        //查找
        $where = function ($query) use ($request) {
            if ($request->has('keyword') and $request->keyword != '') {
                $search = "%" . $request->keyword . "%";
                $query->where('name', 'like', $search);
            }
        };
        $links = Link::where($where)->orderBy('sort_order')->paginate(config('admin.page_size'));
        return view('admin.cms.link.index', compact('links'));
    }

    /**
     * 新增
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function create()
    {
        return view('admin.cms.link.create');
    }

    /**
     * 保存
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function store(Request $request)
    {
        Link::create($request->all());
        return redirect(route('cms.link.index'))->with('notice', '新增成功~');
    }

    /**
     * 编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function edit($id)
    {
        $link = Link::find($id);
        return view('admin.cms.link.edit', compact('link'));
    }

    /**
     * 更新
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(Request $request, $id)
    {
        $link = Link::find($id);
        $link->update($request->all());
        return back()->with('notice', '编辑成功~');
    }

    /**
     * 删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    function destroy($id)
    {
        Link::destroy($id);
        return back()->with('notice', '删除成功');
    }

    /**
     * 多选删除
     * @param Request $request
     * @return array
     */
    function destroy_checked(Request $request)
    {
        $checked_id = $request->input("checked_id");
        Link::destroy($checked_id);

    }

    /**
     * 排序
     * @param Request $request
     * @return array
     */
    function sort_order(Request $request)
    {
        $link = Link::find($request->id);
        $link->sort_order = $request->sort_order;
        $link->save();

    }

    /**
     * 修改属性
     * @param Request $request
     * @return array
     */
    function is_something(Request $request)
    {
        $attr = $request->attr;
        $link = Link::find($request->id);
        $value = $link->$attr ? false : true;
        $link->$attr = $value;
        $link->save();

    }
}
