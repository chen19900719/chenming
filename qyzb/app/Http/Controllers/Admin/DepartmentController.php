<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate;
use App\Http\Controllers\Controller;
use App\Model\Department;
use App\Model\DepartmentLog;
use Validator;
use DB;

class DepartmentController extends Controller
{

    //部门首页
    public function index()
    {

        return view('admin.department');
    }

    //新增部门
    public function create(Request $request)
    {
        if ($_POST) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'desc' => 'required',
            ], [
                'name.required' => '请输入部门名称',
                'desc.required' => '请输入部门描述',
            ]);
            $error = $validator->errors()->all();
            if (count($error)) {
                return redirect()->back()->with(['message' => $validator->errors()->first()]);
            }

            $data = array(
                'name' => $request->name,
                'desc' => $request->desc,
                'img' => $request->file,
                'created_at' => date('Y-m-d H:i:s')
            );
            $status = DB::transaction(function () use ($data) {
                //新增并获取增加数据的主键
                $departmentID = Department::insertGetId($data);
                //部门日志的生成
                $desc = '部门【' . $data['name'] . '】创建成功';
                DepartmentLog::createLog($departmentID, 'department', $departmentID, $desc);
                return $departmentID;
            });
            if ($status) {
                return redirect()->to('/admin/department/departmentadd/' . $status)->with('message', ' 新增成功');
            } else {
                return redirect()->with('message', '保存失败');
            }
        }
        return view('department.create');
    }

    //新增职位
    public function department_add()
    {
        return view('department.departmentadd');
    }

}
