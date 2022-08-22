<?php

namespace Domain\Auth\Actions;

use Domain\Auth\DataTransferObjects\RegisterData;
use Domain\Auth\Models\User;
use Illuminate\Support\Facades\Hash;

class Register
{
    public function handle(RegisterData $registerData): User
    {
        $attributes = $registerData->toArray();

        $attributes['password'] = Hash::make($attributes['password']);

        return User::create($attributes);
    }
}
