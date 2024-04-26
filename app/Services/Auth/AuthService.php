<?php

/**
 * @author RedHead_DEV = [Kravchenko Dmitriy => dkraf9006@gmail.com]
 */

namespace App\Services\Auth;

use App\Helpers\Phone;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Метод авторизации пользователя
     *
     * @param LoginRequest $request
     * @return array
     * @throws \Exception
     */
    public function login(LoginRequest $request): array
    {
        $inData = $request->getSanitized();
        $inData['phone'] = Phone::formatPhone($inData['phone']);

        $user = User::where('phone', $inData['phone'])->first();

        if (!$user){

            throw new \Exception('Пользователь c указанным номером не найден', 401);

        } elseif(!Hash::check($inData['password'], $user->password) ){

            throw new \Exception('Неверный пароль', 401);
        }

        $tokens = $user->tokens;

        foreach ($tokens as $token) {
            $token->delete();
        }
        return array (
            'token' => $user->createToken($user->phone)->plainTextToken,
        );
    }


    /**
     * Метод логаута юзера
     *
     * @return array
     * @throws \Exception
     */
    public function logout(): array
    {
        if (!$user = Auth::user()) {
            throw new \Exception('Ошибка аутентификации пользователя', 401);
        }

        $user->tokens()->delete();

        return array('user_id' => $user->id);
    }


    /**
     * Метод регистрации пользователя с сайта
     *
     * @param RegisterRequest $request
     * @return array
     * @throws \libphonenumber\NumberParseException
     */
    public function create(RegisterRequest $request): array
    {
        $sanitized = $request->getSanitized();

        $sanitized['password'] = Hash::make($sanitized['password']);
        $sanitized['phone'] = Phone::formatPhone($sanitized['phone']);

        $user = User::where('phone', $sanitized['phone'])->first();

        if ($user) {
            throw new \Exception('Этот номер уже зарегестрирован!', 422);
        }

        $user= User::create($sanitized);

        return array('user_id' => $user->id);
    }

}
