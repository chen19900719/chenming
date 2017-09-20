<?php

namespace App\Http\Controllers\Admin\Crm;

use App\Models\Crm\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * 课程分类列表
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::get_teams();
        return view('admin.crm.team.index', compact('teams'));
    }

    public function index_list()
    {
        $teams = Team::get_teams();
        return view('admin.crm.team.index_list', compact('teams'));
    }

    /**
     * 保存
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        Team::create($request->all());
        Team::clear();
        return ['status' => 1, 'teams' => Team::get_teams()];
    }

    /**
     * 编辑
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return $team;
    }

    /**
     * 更新
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        $team->update($request->all());
        Team::clear();
        return ['status' => 1, 'teams' => Team::get_teams()];
    }

    /**
     * 查看
     * @param $id
     * @return $this
     */
    function show($id)
    {
        $team = Team::with('students')->find($id);
        return view('admin.crm.team.show', compact('team'));
    }

    /**
     * 删除
     * @param $id
     * @return array|\Illuminate\Http\RedirectResponse
     */
    function destroy($id)
    {
        if (!Team::check_children($id)) {
            return ['status' => 0, 'msg' => '当前分类有子分类，请先将子分类删除后再尝试删除~'];
        }

        if (!Team::check_students($id)) {
            return back()->with('alert', '当前栏目有课程，请先将对应课程删除后再尝试删除~');
        }

        Team::destroy($id);
        Team::clear();
        return ['status' => 1, 'teams' => Team::get_teams()];
    }

    /**
     * 排序
     * @param Request $request
     * @return array
     */
    function sort_order(Request $request)
    {
        $sort_order = json_decode($request->sort_order);

        //一级
        foreach ($sort_order as $key => $value) {
            Team::sort_order($value->id, 0, $key);

            //二级
            if (isset($value->children)) {
                foreach ($value->children as $k => $v) {
                    Team::sort_order($v->id, $value->id, $k);
                }
            }
        }

        Team::clear();
    }
}
