<?php

/**
 * @author RedHead_DEV = [Kravchenko Dmitriy => dkraf9006@gmail.com]
 */

namespace App\Http\Controllers;

use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Http\Resources\News\NewsResource;
use App\Services\NewsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TasksController extends Controller
{
    /**
     * Метод создания новой новости CRM
     *
     * @param TasksService $newsService
     * @param CreateNewsRequest $request
     * @return JsonResponse
     */
    public function create(TasksService  $newsService, CreateNewsRequest $request): JsonResponse
    {
        try {

            return $this->success($newsService->create($request));

        } catch (\Exception $e) {

            return $this->error($e->getMessage() , 502);

        }
    }


    /**
     * Метод получения списка новостей для CRM
     *
     * @param TasksService $newsService
     * @param Request $request
     * @return JsonResponse
     */
    public function list(TasksService $newsService, Request $request): JsonResponse
    {
        try {

            $news = $newsService->list($request);
            return $this->success(
                NewsResource::collection($news),
                $this->getPaginateValue($news)
            );

        } catch (\Exception $e) {

            return $this->error($e->getMessage() , 502);

        }
    }

    /**
     * Метод получения карточки новости для CRM
     *
     * @param NewsService $newsService
     * @param int $newsId
     * @return JsonResponse
     */
    public function read(NewsService $newsService, int $newsId): JsonResponse
    {
        try {

            return $this->success(new NewsResource($newsService->read($newsId)));

        } catch (\Exception $e) {

            return $this->error($e->getMessage() ,  404);

        }
    }


    /**
     * Метод редактирования новости CRM
     *
     * @param NewsService $newsService
     * @param UpdateNewsRequest $request
     * @param $newsId
     * @return JsonResponse
     */
    public function update(
        NewsService $newsService,
        UpdateNewsRequest $request,
        $newsId
    ): JsonResponse
    {
        try {

            return $this->success($newsService->update($request, $newsId));

        } catch (\Exception $e) {

            return $this->error($e->getMessage() , 502);

        }
    }

    /**
     * Метод удаления новости CRM
     *
     * @param NewsService $newsService
     * @param $newsId
     * @return JsonResponse
     */
    public function delete(NewsService $newsService, $newsId): JsonResponse
    {
        try {

            return $this->success($newsService->delete($newsId));

        } catch (\Exception $e) {

            return $this->error($e->getMessage() , 502);

        }
    }


    /**
     * Метод получения списка новостей
     *
     * @param NewsService $newsService
     * @param Request $request
     * @return JsonResponse
     */
    public function onlyActive(NewsService $newsService, Request $request): JsonResponse
    {
        try {

            $news = $newsService->onlyActive($request);
            return $this->success(
                NewsResource::collection($news),
                $this->getPaginateValue($news)
            );

        } catch (\Exception $e) {

            return $this->error($e->getMessage() , 502);

        }
    }
}
