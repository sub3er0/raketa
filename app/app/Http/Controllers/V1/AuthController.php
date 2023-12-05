<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param RegistrationRequest $request
     * @param AuthService $authService
     * @return JsonResponse
     */
    public function register(RegistrationRequest $request, AuthService $authService): JsonResponse
    {
        return $authService->register($request);
    }

    /**
     * @param LoginRequest $request
     * @param AuthService $authService
     * @return JsonResponse
     */
    public function login(LoginRequest $request, AuthService $authService): JsonResponse
    {
        return $authService->login($request);
    }
}
