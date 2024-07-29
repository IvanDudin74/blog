<?php

namespace App\Http\Requests\Admin\Comment;

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
            'message' => 'required|string',
            'post_id' => 'required|integer',
        ];
    }

    public function messages() {
        return [
            'message.required' => 'This item is reqired',
            'message.string' => 'This item must be string',
            'post_id.required' => 'This item is reqired',
            'post_id.string' => 'This item must be string',
        ];
    }
}
