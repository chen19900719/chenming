<?php

namespace App\Http\Controllers\Admin\Crm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Crm\Student;
use App\Models\Crm\Team;

class StudentController extends Controller
{

    /**
     * 客户列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(Request $request)
    {
        //多条件查找
        $where = function ($query) use ($request) {
            if ($request->has('name') and $request->name != '') {
                $search = "%" . $request->name . "%";
                $query->where('name', 'like', $search);
            }

            if ($request->has('company') and $request->company != '') {
                $search = "%" . $request->company . "%";
                $query->where('company', 'like', $search);
            }

            if ($request->has('is_finished') and $request->is_finished != '-1') {
                $query->where('is_finished', $request->is_finished);
            }

            if ($request->has('created_at') and $request->created_at != '') {
                $time = explode(" ~ ", $request->input('created_at'));
                foreach ($time as $k => $v) {
                    $time["$k"] = $k == 0 ? $v . " 00:00:00" : $v . " 23:59:59";
                }
                $query->whereBetween('created_at', $time);
            }
        };
        $students = Student::with('team')->where($where)
            ->orderBy('created_at', 'desc')
            ->paginate(config('admin.page_size'));
        return view('admin.crm.student.index', compact('students'));
    }

    /**
     * 新增
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function create()
    {
        $students = Student::all();
        $teams = Team::get_teams();
        $created_at = date("Y-m-d", time());
        return view('admin.crm.student.create', compact('students', 'teams', 'created_at'));
    }

    /**
     * 保存
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        Student::create($request->all());
        return redirect(route('crm.student.index'))->with('notice', '新增成功~');
    }

    /**
     * 编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function edit($id)
    {
        $teams = Team::get_teams();
        $student = Student::with('team')->find($id);
        $students = Student::get();
        return view('admin.crm.student.edit', compact('student', 'students', 'teams'));
    }

    /**
     * 更新
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $student = Student::find($id);
        $student->update($request->all());
        return redirect(route('crm.student.index'))->with('notice', '修改成功~');
    }

    /**
     * 删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    function destroy($id)
    {
        Student::destroy($id);
        return back()->with('notice', '您已经成功将此劣徒驱逐出师门~');
    }

    /**
     * Ajax修改属性
     * @param Request $request
     * @return array
     */
    function is_something(Request $request)
    {
        $attr = $request->attr;
        $student = Student::find($request->id);
        $value = $student->$attr ? false : true;
        $student->$attr = $value;
        $student->save();
    }
}
