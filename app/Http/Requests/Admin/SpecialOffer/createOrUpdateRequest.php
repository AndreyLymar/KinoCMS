<?php

namespace App\Http\Requests\Admin\SpecialOffer;

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
            'special_offer_id' => 'nullable|integer',
            'status' => 'nullable|string',
            'title' => 'required|string|max:255',
            'date_published' => 'required|date',
            'link_to_video' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'main_img' => 'nullable|file',
            'main_img_old' => 'nullable|string',
            'img' => 'nullable|array',
            'seo_url'=>['nullable', 'string', 'max:255'],
            'seo_title'=>['nullable', 'string'],
            'seo_description'=>['nullable', 'string'],
            'seo_keywords'=>['nullable', 'string'],
        ];
    }
}
