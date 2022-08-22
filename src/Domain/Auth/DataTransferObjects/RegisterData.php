<?php

namespace Domain\Auth\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class RegisterData extends DataTransferObject
{
    public readonly string $name;

    public readonly string $email;

    public readonly string $password;

    public static function fromRequest(Request $request): self
    {
        return new self($request->validated());
    }
}
