<?php

namespace App\Modules\Manage\Models;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany('App\Modules\Manage\Models\Permission', 'fid', 'id');
    }
}
