<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Domain\Auth\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::viaRequest('jwt', function (Request $request) {
            try {
                $jwt = JWT::decode((string) $request->bearerToken(), new Key(config('auth.jwt.secret_key'), 'HS256'));

                if ($jwt->exp <= time()) {
                    return null;
                }

                return User::find($jwt->user->id);
            } catch (\Exception) {
                return null;
            }
        });
    }
}
