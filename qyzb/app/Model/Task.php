<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function attaches()
    {
        return $this->hasMany('App\Model\Attach', 'task_id', 'id');
    }
}
