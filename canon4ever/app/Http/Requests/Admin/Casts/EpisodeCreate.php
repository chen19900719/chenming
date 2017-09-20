<?php

namespace App\Http\Requests\Admin\Casts;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeCreate extends FormRequest
{
    /**
     * 是否验证
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 新建课程验证
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'serie_id' => 'required|max:255',
            'name' => 'required|max:255',
            'episode' => 'required|integer|max:2',
            'video' => 'required|url',
        ];
    }
}
