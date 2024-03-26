<?php

namespace App\Http\Requests\Admin\User;

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
            'email' => ['required', 'string', 'email' , Rule::unique('users', 'email')->ignore($this->user)],
            'name' => ['required', 'string', Rule::unique('users', 'name')->ignore($this->user)],
            'role_id' => ['required', 'integer',]
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'name' => 'Name',
            'role_id'=> 'Role',
        ];
    }

}
