<?php

namespace App\Http\Requests\Posts;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Filter extends FormRequest
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
            'title' => ['string','min:3','max:30'],
            'content' => 'string|min:5|max:1000',
            'email' => ['email'],
            'image' => 'string',
            'category_id' => 'exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id',
        ];
    }

    public function attributes() {
        return [
            'title' => 'Заголовок',
            'content' => 'Содержимое',
            'email' => 'Почта',
            'image' => 'Изображение',
            'category_id' => 'Категория',
            'tags' => 'Теги',
            'tags.*' => 'Тег',

        ];
    }
}
