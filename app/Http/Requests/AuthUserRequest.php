<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8|max:256',
        ];
    }
}
