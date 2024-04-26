<?php

/**
 * @author RedHead_DEV = [Kravchenko Dmitriy => dkraf9006@gmail.com]
 */

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Services\TasksService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TasksController extends Controller
{
    /**
     * @param TasksService $taskService
     * @param CreateTaskRequest $request
     * @return JsonResponse
     */
    public function create(TasksService  $taskService, CreateTaskRequest $request): JsonResponse
    {
        return $this->success($taskService->create($request));
    }


    /**
     * @param TasksService $taskService
     * @param Request $request
     * @return JsonResponse
     */
    public function list(TasksService $taskService, Request $request): JsonResponse
    {
        $tasks = $taskService->list($request);
        return $this->success(TaskResource::collection($tasks), $this->getPaginateValue($tasks));
    }


    /**
     * @param TasksService $taskService
     * @param int $taskId
     * @return JsonResponse
     * @throws \Exception
     */
    public function read(TasksService $taskService, int $taskId): JsonResponse
    {
        return $this->success(new TaskResource($taskService->read($taskId)));
    }


    /**
     * @param TasksService $taskService
     * @param UpdateTaskRequest $request
     * @param $taskId
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(TasksService $taskService, UpdateTaskRequest $request, $taskId): JsonResponse
    {
        return $this->success($taskService->update($request, $taskId));
    }


    /**
     * @param TasksService $taskService
     * @param $taskId
     * @return JsonResponse
     * @throws \Exception
     */
    public function delete(TasksService $taskService, $taskId): JsonResponse
    {
        return $this->success($taskService->delete($taskId));
    }

}
