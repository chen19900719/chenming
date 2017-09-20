<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
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
        return [
            'name' => 'required|unique:menus,name',
            'parent_id' => 'required',
            'url' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '菜单名称不能为空',
            'name.unique' => '菜单名字不能重复',
            'parent_id.required' => '菜单层级不能为空',
            'url.required' => '菜单链接不能为空',
        ];
    }
}
