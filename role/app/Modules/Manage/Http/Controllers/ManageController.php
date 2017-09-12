<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Manage\Models\Permission;
use App\Modules\Manage\Models\Role;
use Illuminate\Http\Request;
use  App\Modules\Manage\Models\ManageModel;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{
    public function ManageRole()
    {

    }

    public function index()
    {
        return view('manage.index');
    }

    public function deletePermission($id)
    {
        Permission::destroy($id);
        return redirect()->to('/manage/menuPermission')->with('message', '删除成功');
    }

    //菜单与权限列表
    public function menuPermission()
    {
        $perms = Permission::with('children')->where('fid', 0)->get();
        return view('manage.role.menupermission')->with('perms', $perms);
    }

    //新增菜单权限
    public function addMenuPermission(Request $request)
    {
        if ($_POST) {
            Permission::create($request->all());
            return redirect()->to('/manage/menuPermission')->with('message', '新增成功');
        }
        $perms = Permission::where('fid', 0)->get();
        return view('manage.role.menupermissionadd')->with('perms', $perms);
    }

    //新增菜单权限
    public function editMenuPermission(Request $request, $id)
    {
        if ($_POST) {
            $perm = Permission::find($id);
            $perm->update($request->all());
            return redirect()->to('/manage/menuPermission')->with('message', '修改成功');
        }
        $perms = Permission::where('fid', 0)->get();
        $perm = Permission::find($id);
        return view('manage.role.menupermissionedit')->with('perms', $perms)->with('perm', $perm);
    }

    //角色列表
    public function roleList()
    {
        $role = Role::all();
        return view('manage.role.rolelist')->with('role', $role);
    }

    //新增角色
    public function addRole(Request $request)
    {
        if ($_POST) {
            $data = $request->except('_token');
            $role = Role::create([
                'name' => $data['name']
            ]);
            $role->perms()->sync($data['permission_id']);
            return redirect()->to('/manage/roleList')->with('message', '新增成功');
        }
        $permissions = Permission::with('children')->where('fid', 0)->get();
        return view('manage.role.rolecreate')->with('permissions', $permissions);
    }

    //编辑角色
    public function editRole(Request $request, $id)
    {
        if ($_POST) {
            $data = $request->except('_token');
            $role = Role::find($id);
            $role->update([
                'name' => $data['name']
            ]);
            if (!empty($data['permission_id'])) {
                $role->perms()->sync($data['permission_id']);
            }

            return redirect()->to('/manage/roleList')->with('message', '修改成功');
        }
        $role = Role::with('perms')->find($id);
        $perm_id = $role->perms->pluck('id')->toArray();
        $permissions = Permission::with('children')->where('fid', 0)->get();
        return view('manage.role.roleupdate', compact('role', 'perm_id', 'permissions'));
    }

    //用户列表
    public function manageList()
    {
        $manage = ManageModel::with('roles')->get();
        return view('manage.role.managelist')->with('manage', $manage);
    }

    public function addManage(Request $request)
    {
        if ($_POST) {
            $data = $request->except('_token');
            $manage = ManageModel::create([
                'name' => $data['name'],
                'password' => $data['password'],
            ]);
            $manage->roles()->attach($data['role_id']);
            return redirect()->to('/manage/manageList')->with('message', '新增成功');
        }
        $role = Role::all();
        return view('manage.role.managecreate')->with('role', $role);

    }

    //编辑用户修改角色
    public function editManage(Request $request, $id)
    {
        if ($_POST) {
            $data = $request->except('_token');
            $manage = ManageModel::with('roles')->find($id);
            $role_id = $manage->roles->pluck('id');
            $manage->roles()->detach($role_id);
            $manage->roles()->attach($data['role_id']);
            return redirect()->to('/manage/manageList')->with('message', '新增成功');
        }
        $manage = ManageModel::with('roles')->find($id);
        $role_id = $manage->roles->pluck('id');
        $role_id = array_flatten($role_id);
        $role = Role::all();
        return view('manage.role.manageupdate', compact('manage', 'role', 'role_id'));
    }
}
