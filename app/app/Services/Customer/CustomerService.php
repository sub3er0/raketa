<?php

declare(strict_types=1);

namespace App\Services\Customer;

use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    /**
     * @param CreateCustomerRequest $request
     * @param AuthService $authService
     * @return JsonResponse
     */
    public function create(CreateCustomerRequest $request, AuthService $authService)
    {
        $manager = $authService->findUserByToken($request->header('Authorization'));
        $user = new User([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        $user->role_id = 2;
        $user->manager_id = $manager->id;
        $user->save();
        return response()->json(['Пользователь зарегистрирован'], 200);
    }
}
