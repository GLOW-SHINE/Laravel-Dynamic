<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // API-তে সাধারণত true
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|min:3|max:50',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone'    => 'nullable|digits:10',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique'      => 'This email is already registered.',
            'password.confirmed'=> 'Password confirmation does not match.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors'  => $validator->errors(),
            ], 422)
        );
    }
}
