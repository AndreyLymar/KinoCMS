<?php

namespace App\Http\Requests\Admin\Film;

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
            'film_id' => 'nullable|integer',
            'status' => 'string',
            'type_3d' => 'nullable|string',
            'type_2d' => 'nullable|string',
            'type_imax' => 'nullable|string',
            'title' => 'required|string|max:255',
            'url_movie_trailer' => 'required|string|max:255',
            'description' => 'required|string',
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
