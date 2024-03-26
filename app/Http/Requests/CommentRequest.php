<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CommentRequest extends FormRequest
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
            'content' => ['required','string','min:5','max:30'],
            'entity_id' => '',
            'entity_type' => '',
        ];
    }

    public function attributes() {
        return [
            'content' => 'Комментарий',
        ];
    }

    public function checkCommentable() {
        $commentabales = config('commentable');

        if(!isset($commentabales[$this->entity_type])) {

            throw ValidationException::withMessages([
            'entity_type' => trans('auth.failed'),
             ]);

        }

        $model = $commentabales[$this->entity_type]::findOrFail($this->entity_id);
        return $model;


    }
}
