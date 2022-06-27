<?php

namespace App\Http\Requests\Admin\Cinema;

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
            'cinema_id' => 'nullable|integer',
            'terms' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'logo_img' => 'nullable|file',
            'logo_img_old' => '',
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
