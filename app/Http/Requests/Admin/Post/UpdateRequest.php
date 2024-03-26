<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title' => ['required','string','min:5','max:30',Rule::unique('posts', 'title')->ignore($this->post)],
            'content' => 'required|string|min:10|max:1000',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id',
        ];
    }

}
