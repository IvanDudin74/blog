<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'role' => 'required|integer',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'This item is reqired',
            'name.string' => 'This item must be string',
            'role.required' => 'This item is reqired',
            'role.integer' => 'This item must be integer',
            'email.required' => 'This item is reqired',
            'email.string' => 'This item must be string',
            'email.email' => 'This item must be email type',
            'password.required' => 'This item is reqired',
            'password.string' => 'This item must be string',
            'email.unique' => 'This email already exists in database',
        ];
    }
}
