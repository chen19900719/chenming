<?php

namespace App\Modules\Manage\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class ManageModel extends Model
{

    use EntrustUserTrait;
    //
    protected $table = 'users';
    protected $guarded = [];

}
