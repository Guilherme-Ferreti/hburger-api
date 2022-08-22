<?php

namespace App\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => ['required', 'string', 'max:255', 'email'],
            'password' => ['required', 'string', 'max:255'],
        ];
    }
}
