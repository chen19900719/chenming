<?php

namespace App\Modules\Manage\Models;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $guarded = [];
}
