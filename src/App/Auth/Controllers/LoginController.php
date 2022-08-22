<?php

namespace App\Auth\Controllers;

use App\Auth\Requests\LoginRequest;
use App\Auth\Resources\UserResource;
use Domain\Auth\Actions\Login;
use Domain\Auth\DataTransferObjects\LoginData;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(LoginRequest $request)
    {
        [$user, $jwt] = app(Login::class)->handle(LoginData::fromRequest($request));

        return response()->json([
            'user'        => new UserResource($user),
            'accessToken' => $jwt,
        ]);
    }
}
