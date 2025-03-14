<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3','max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'min: 6',
                'max:20',
                Rule::unique('users', 'email')->ignore($this->user, 'id'),
            ],
            'password' => [
                'required',
                'min: 6',
                'max:20'],
        ];
    }
}
