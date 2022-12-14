<?php

namespace App\Api\Auth\Controllers;

use App\Api\Auth\Requests\RegisterRequest;
use App\Api\Auth\Resources\UserResource;
use Domain\Auth\Actions\Login;
use Domain\Auth\Actions\Register;
use Domain\Auth\DataTransferObjects\LoginData;
use Domain\Auth\DataTransferObjects\RegisterData;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(RegisterRequest $request)
    {
        $user = app(Register::class)->handle(RegisterData::fromRequest($request));

        [$user, $jwt] = app(Login::class)->handle(LoginData::fromRequest($request));

        return response()->json([
            'user'        => new UserResource($user),
            'accessToken' => $jwt,
        ]);
    }
}
