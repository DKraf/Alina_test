<?php

/**
 * @author RedHead_DEV = [Kravchenko Dmitriy => dkraf9006@gmail.com]
 */

namespace App\Http\Controllers\Dictionaries;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dictionaries\StatusResource;
use App\Models\Dictionary\Status;
use Illuminate\Http\JsonResponse;


class StatusController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return $this->success(StatusResource::collection(Status::get()));
    }
}
