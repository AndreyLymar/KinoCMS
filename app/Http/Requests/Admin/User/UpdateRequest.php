<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'user_id' => 'integer|exists:users,id',
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','email', 'unique:users,email,' . $this->user_id],
            'password' => ['nullable','string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'min:14','unique:users,phone,' . $this->user_id],
            'role' => ['int'],
            'pseudonym' => ['nullable','string', 'max:255'],
            'address' => ['nullable','string', 'max:255'],
            'gender' => ['nullable','string', 'max:15'],
            'date_of_birth' => ['nullable','date'],
            'city_id' => '',
            'number_card' => ['nullable','string','min:19','max:19'],
        ];
    }
}
