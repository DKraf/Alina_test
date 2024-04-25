<?php

/**
 * @author RedHead_DEV = [Kravchenko Dmitriy => dkraf9006@gmail.com]
 */

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Throwable;

Trait ResponseJsonWithHttpStatus
{
    /**
     * Метод возвращает шаблонный Json для ответа на запрос в случае успещного выполнения
     *
     * @param  $data
     * @param int $status
     * @return JsonResponse
     */
    public function success($data = [], $meta = null,  int $status = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => null,
            'data' => $data,
            'meta' => $meta,
        ], $status);
    }


    /**
     * Метод возвращает шаблонный Json для ответа на запрос в случае ошибки
     *
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function error(string $message, int $status = 422): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
        ], $status);
    }

}
