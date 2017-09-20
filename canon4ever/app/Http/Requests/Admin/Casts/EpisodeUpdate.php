<?php

namespace App\Http\Requests\Admin\Casts;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeUpdate extends FormRequest
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
            'serie_id' => 'required|max:255',
            'name' => 'required|max:255',
            'episode' => 'required|integer|max:2',
            'video' => 'required|url',
            //验证文件必须匹配给定的MIME文件类型之一：
            //'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime'
        ];
    }
}
