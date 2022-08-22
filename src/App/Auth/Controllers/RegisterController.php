<?php

namespace App\Auth\Controllers;

use App\Auth\Requests\RegisterRequest;
use App\Auth\Resources\UserResource;
use Domain\Auth\Actions\Register;
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

        return new UserResource($user);
    }
}
