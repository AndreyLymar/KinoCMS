<?php

namespace App\Http\Requests\Admin\Hall;

use Illuminate\Foundation\Http\FormRequest;


class createOrUpdateRequest extends FormRequest
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
            'id' => 'nullable|array',
            'hall_id' => 'nullable|integer',
            'cinema_id' => 'nullable|integer',
            'number' => 'required|integer|max:255|unique:halls,id,' . $this->hall_id,
            'description' => 'required|string',
            'hall_img' => 'nullable|file',
            'hall_img_old' => '',
            'top_banner_img_old' => '',
            'top_banner_img' => 'nullable|file',
            'img' => 'nullable|array',
            'seo_url'=>['nullable', 'string', 'max:255'],
            'seo_title'=>['nullable', 'string'],
            'seo_description'=>['nullable', 'string'],
            'seo_keywords'=>['nullable', 'string'],
        ];
    }
}
