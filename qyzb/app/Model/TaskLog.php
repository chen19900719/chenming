<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    protected $table = 'task_log';
    protected $guarded = [];
    public $timestamps = false;

    /**
     * 生成任务日志
     * @param $relation_id
     * @param $relation_type
     * @param $department_id
     * @param $desc
     * @return mixed
     */
    static function createLog($relation_id, $relation_type, $task_id, $desc)
    {
        $LogInfo = ([
            'relation_id' => $relation_id,
            'relation_type' => $relation_type,
            'task_id' => $task_id,
            'desc' => $desc,
            'created_at' => date('Y-m-d H:i:s', time())
        ]);
        $LogInfoId = self::insertGetId($LogInfo);
        return $LogInfoId;
    }
}
