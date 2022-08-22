<?php

namespace Domain\Auth\Actions;

use Domain\Auth\DataTransferObjects\LoginData;
use Domain\Auth\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login
{
    public function handle(LoginData $data): array
    {
        $user = User::where('email', $data->email)->first();

        if (! $user || ! Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        return [
            $user->fresh(),
            self::createJwtFor($user),
        ];
    }

    protected function createJwtFor(User $user): string
    {
        $payload = [
            'user' => [
                'id' => $user->id,
            ],
            'iat' => time(),
            'exp' => time() + config('auth.jwt.expires_in'),
        ];

        return JWT::encode($payload, config('auth.jwt.secret_key'), 'HS256');
    }
}
