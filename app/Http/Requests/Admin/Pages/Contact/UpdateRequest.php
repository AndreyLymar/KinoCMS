<?php

namespace App\Http\Requests\Admin\Pages\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'logo_img_old' => '',
            'cinema_id' => 'required',
            'address' => 'required|string',
            'coordinates' => 'required|string',
            'logo_img' => 'nullable|file',
            'seo_url'=>['nullable', 'string', 'max:255'],
            'seo_title'=>['nullable', 'string'],
            'seo_description'=>['nullable', 'string'],
            'seo_keywords'=>['nullable', 'string'],
        ];
    }
}
