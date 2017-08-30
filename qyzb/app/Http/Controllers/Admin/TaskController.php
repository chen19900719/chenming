<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Task;
use App\Model\TaskLog;
use DB;
use App\Http\Requests\CreateUserRequest;
use App\Model\Attach;

class TaskController extends Controller
{
    /**
     * 项目首页
     * @return $this
     */
    public function index()
    {
        $tasks = Task::with('attaches')->get();
        $attaches = Attach::aLL();
        foreach ($tasks as $k => $v) {
            $aa = [];
            foreach ($attaches as $key => $value) {
                if (!empty($value['task_id'])) {
                    if ($v['id'] == $value['task_id']) {
                        $aa[] = $value;
                    }
                }
            }
            if (!empty($aa)) {
                $tasks[$k]['attach'] = $aa;
            }
        }
        return view('admin.task.index')->with('tasks', $tasks);
    }

    /**
     * 新增项目
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //合同样式
        $contractType = \CommonClass::contractType();
        //报价方式
        $paySay = \CommonClass::paySay();
        //支付方式
        $payType = \CommonClass::payType();
        $data = [
            'contractType' => $contractType,
            'paySay' => $paySay,
            'payType' => $payType
        ];
        return view('admin.task.create', $data);
    }

    /**
     * 保存项目
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_time' => 'required|date|after:tomorrow',
            'end_time' => 'required|date|after:start_time',
            'price' => 'required|numeric',
            'desc' => 'required',
        ], [
            'name.required' => '请输入部门描述',
            'start_time.required' => '开始时间不能为空',
            'end_time.required' => '结束时间不能为空',
            'start_time.after' => '时间不能比现在早',
            'end_time.after' => '结束时间不能大于开始时间',
            'price.required' => '金额不能为空',
            'price.numeric' => '请填写正确的金额',
            'desc.required' => '项目描述不能为空'
        ]);
        $errors = $validator->errors()->all();
        if (count($errors)) {
            return redirect()->back()->with(['message' => $validator->errors()->first()]);
        }
        $data = [
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'price' => $request->price,
            'desc' => $request->desc,
            'contract_id' => $request->contract_id,
            'thumb' => $request->thumb,
            'push_id' => $request->push_id,
            'skill_id' => $request->skill_id,
            'cate_id' => $request->cate_id
        ];
        $status = DB::transaction(function () use ($data, $request) {
            $task = Task::create($data);
            foreach ($request->file_id as $k => $v) {
                Attach::where('id', $v)->update(['task_id' => $task['id']]);
            }
            $desc = '任务【' . $data['name'] . '】创建成功';
            //生成任务创建日志
            TaskLog::createLog($task->id, 'task', $task->id, $desc);
        });
        if (is_null($status)) {
            return redirect()->to('/admin/task')->with('message', ' 新增成功');
        } else {
            return redirect()->back()->with('message', '新增失败');
        }
    }

    public function edit(Request $request, $id)
    {
        //合同样式
        $contractType = \CommonClass::contractType();
        //报价方式
        $paySay = \CommonClass::paySay();
        //支付方式
        $payType = \CommonClass::payType();
        $task = Task::with('attaches')->find($id);
        $data = [
            'contractType' => $contractType,
            'paySay' => $paySay,
            'payType' => $payType,
            'task' => $task
        ];
        return view('admin.task.edit', $data);
    }

    public function save(CreateUserRequest $request)
    {

    }

    //关联附件上传
    public function fileUpload()
    {

    }
}
