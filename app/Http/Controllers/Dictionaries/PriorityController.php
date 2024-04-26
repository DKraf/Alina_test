<?php

/**
 * @author RedHead_DEV = [Kravchenko Dmitriy => dkraf9006@gmail.com]
 */

namespace App\Http\Controllers\Dictionaries;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dictionaries\PriorityResource;
use App\Models\Dictionary\Priority;
use Illuminate\Http\JsonResponse;


class PriorityController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return $this->success(PriorityResource::collection(Priority::get()));
    }
}
