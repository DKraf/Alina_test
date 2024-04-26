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


class AuthController extends Controller
{
    /**
     * Метод авторизации Пользователя
     *
     * @param LoginRequest $request
     * @param AuthService $authService
     * @return JsonResponse
     */
    public function login(LoginRequest $request, AuthService $authService): JsonResponse
    {
        try {
            return $this->success($authService->login($request));

        } catch (\Exception $e) {

            return $this->error($e->getMessage() , 400);

        }
    }


    /**
     * Метод Логаут (выхода) с ЛК
     *
     * @param AuthService $authService
     * @return JsonResponse
     */
    public function logout (AuthService $authService): JsonResponse
    {
        try {

            return $this->success($authService->logout());

        } catch (\Exception $e) {

            return $this->error($e->getMessage() , 502);

        }
    }

    /**
     * Метод создания нового пользователя
     *
     * @param AuthService $authService
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function create(AuthService $authService, RegisterRequest $request): JsonResponse
    {
        try {

            return $this->success($authService->create($request));

        } catch (\Exception $e) {

            return $this->error($e->getMessage() , 502);

        }
    }
}
