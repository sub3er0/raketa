<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Services\Auth\AuthService;
use App\Services\Customer\CustomerService;

class CustomerController
{
    /**
     * @param CreateCustomerRequest $request
     * @param AuthService $authService
     * @param CustomerService $customerService
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateCustomerRequest $request, AuthService $authService, CustomerService $customerService)
    {
        return $customerService->create($request, $authService);
    }
}
