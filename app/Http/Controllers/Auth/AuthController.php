<?php

/**
 * @author RedHead_DEV = [Kravchenko Dmitriy => dkraf9006@gmail.com]
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use libphonenumber\NumberParseException;


class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @param AuthService $authService
     * @return JsonResponse
     * @throws \Exception
     */
    public function login(LoginRequest $request, AuthService $authService): JsonResponse
    {
        return $this->success($authService->login($request));
    }


    /**
     * @param AuthService $authService
     * @return JsonResponse
     * @throws \Exception
     */
    public function logout (AuthService $authService): JsonResponse
    {
        return $this->success($authService->logout());
    }

    /**
     * @param AuthService $authService
     * @param RegisterRequest $request
     * @return JsonResponse
     * @throws NumberParseException
     */
    public function create(AuthService $authService, RegisterRequest $request): JsonResponse
    {
        return $this->success($authService->create($request));
    }
}
