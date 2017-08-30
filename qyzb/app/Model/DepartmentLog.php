<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepartmentLog extends Model
{
    protected $table = 'department_log';
    protected $guarded = [];
    public $timestamps = false;

    //生成部门日志
    static function createLog($relation_id, $relation_type, $department_id, $desc)
    {
        $LogInfo = ([
            'relation_id' => $relation_id,
            'relation_type' => $relation_type,
            'department_id' => $department_id,
            'desc' => $desc,
            'created_at' => date('Y-m-d H:i:s', time())
        ]);
        $LogInfoId = self::insertGetId($LogInfo);
        return $LogInfoId;
    }
}
