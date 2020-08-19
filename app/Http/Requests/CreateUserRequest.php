<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username' => 'required|min:2|max:30',
            'email' => 'required|email|unique:users,email'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Truong nay khong duoc de trong',
            'name.min' => 'Truong nay it nhat co 2 ky tu'
        ];
    }
}
