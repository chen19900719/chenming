<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    protected $rules = [
        'Student.userName' => 'required|between:2,4',
        'Student.userAge' => 'required|integer',
        'Student.userSex' => 'required|integer',
        'Student.addr' => 'required',
    ];

    protected $strings_key = [
        'Student.userName' => '用户名',
        'Student.userAge' => '年龄',
        'Student.userSex' => '性别',
        'Student.addr' => '地址',
    ];
    //这里我只写了部分情况，可以按需定义
    protected $strings_val = [
        'required' => '为必填项',
        'min' => '最小为:min',
        'max' => '最大为:max',
        'between' => '长度在:min和:max之间',
        'integer' => '必须为整数',
        'sometimes' => '',
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = $this->rules;
        // 根据不同的情况, 添加不同的验证规则
        if (Request::getPathInfo() == '/save')//如果是save方法
        {
            $rules['Student.addr'] = 'sometimes';
        }
        if (Request::getPathInfo() == '/edit')//如果是edit方法
        {
            $rules['Student.addr'] = 'required|min:5';
        }
        return $rules;

    }

    public function messages()
    {
        $rules = $this->rules();
        $k_array = $this->strings_key;
        $v_array = $this->strings_val;
        foreach ($rules as $key => $value) {
            $new_arr = explode('|', $value);//分割成数组
            foreach ($new_arr as $k => $v) {
                $head = strstr($v, ':', true);//截取:之前的字符串
                if ($head) {
                    $v = $head;
                }
                $array[$key . '.' . $v] = $k_array[$key] . $v_array[$v];
            }
        }
        return $array;
    }
}
