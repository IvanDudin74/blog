<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'This item is reqired',
            'name.string' => 'This item must be string',
            'email.required' => 'This item is reqired',
            'email.string' => 'This item must be string',
            'email.email' => 'This item must be email type',
            'email.unique' => 'This email already exists in database',
        ];
    }
}
