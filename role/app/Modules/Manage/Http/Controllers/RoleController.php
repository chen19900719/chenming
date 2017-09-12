<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Manage\Models\Role;
use  App\Modules\Manage\Models\ManageModel;
use App\Modules\Manage\Models\Permission;


class RoleController extends Controller
{
    public function addRole()
    {
        $owner = new Role();
        $owner->name = 'owner';
        $owner->display_name = 'Project Owner';
        $owner->description = 'User is the owner of a given project';
        $owner->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator';
        $admin->description = 'User is allowed to manage and edit other users';
        $admin->save();

        $manage = ManageModel::where('name', 'chen')->first();
        $manage->roles()->attach($admin->id);
    }

    public function addPermission()
    {
        $createPost = new Permission();
        $createPost->name = 'create-post';
        $createPost->display_name = 'Create Posts';
        $createPost->description = 'create new blog posts';
        $createPost->save();

        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = 'Edit Users';
        $editUser->description = 'edit existing users';
        $editUser->save();


    }

    public function addRolePermission()
    {
        $owner = Role::where('name', 'owner')->first();
        $admin = Role::where('name', 'admin')->first();
        $createPost = Permission::where('name', 'create-post')->first();
        $editUser = Permission::where('name', 'edit-user')->first();
        $owner->attachPermission($createPost);
        $admin->attachPermissions(array($createPost, $editUser));
    }

    public function checkPermission()
    {
        $user = ManageModel::where("name", "chen")->first();
        $user->hasRole('owner'); // false
        $user->hasRole('admin'); // true
        dd($user->can("owner.*"));die; // true
        $user->can('create-post'); // true
//        $user->hasRole(['owner', 'admin']); // true
//        $user->hasRole(['owner', 'admin'], true); // false
//        $user->can(['edit-user', 'create-post']); // true
//        $user->can(['edit-user', 'create-post'], true); // false
    }



}
