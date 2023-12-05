<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @param string $token
     * @return mixed
     */
    public function findUserByToken(string $token)
    {
        [$id, $token] = explode('|', $token, 2);
        $user = User::where('remember_token', $token)->first();
        return $user;
    }

    /**
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function register(RegistrationRequest $request)
    {
        $user = new User([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        $user->role_id = 1;
        $user->save();
        return response()->json(['Менеджер зарегистрирован'], 200);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials, true)) {
            return response()->json(['Unauthorized', 401]);
        }

        $token = $request->user()->createToken('authToken');
        [$id, $plainTextToken] = explode('|', $token->plainTextToken, 2);
        $user = $request->user();
        $user->remember_token = $plainTextToken;
        $user->save();

        return response()->json(['token' => $token], 200);
    }
}
