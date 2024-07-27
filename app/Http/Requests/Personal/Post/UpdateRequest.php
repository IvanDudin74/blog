<?php

namespace App\Http\Requests\Personal\Post;

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
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'main_image' => 'nullable|file',
            'preview_image' => 'nullable|file',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'This item is reqired',
            'title.string' => 'This item must be string',
            'content.required' => 'This item is reqired',
            'content.string' => 'file',
            'category_id.required' => 'This item is reqired',
            'category_id.integer' => 'This item must be integer type',
            'category_id.exists' => 'This item must be exists in database',
            'main_image.file' => 'This item must be file type',
            'preview_image.file' => 'This item must be file type',
            'tag_ids.array' => 'This item must be array type',
            'tag_ids.*.integer' => 'This item must be integer type',
            'tag_ids.*.exists' => 'This item must be exists in database',
        ];
    }
}
