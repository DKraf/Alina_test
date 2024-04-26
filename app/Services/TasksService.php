<?php

/**
 * @author RedHead_DEV = [Kravchenko Dmitriy => dkraf9006@gmail.com]
 */

namespace App\Services;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TasksService
{
    /**
     * @param CreateTaskRequest $request
     * @return array
     * @throws \Exception
     */
    public function create(CreateTaskRequest $request): array
    {
        $data = $request->getSanitized();
        $data['user_id'] = Auth::user()->id;

        return array('task_id' => Task::create($data)->id);
    }


    /**
     * @param Request $request
     * @param int $limit
     * @return mixed
     */
    public function list(Request $request, $limit = 30): mixed
    {
        $sort = $request->get('sort', 'ASC');
        $status = $request->get('status');
        $priority =  $request->get('priority');

        $query = Task::where('user_id', Auth::user()->id)->with([
                'user',
                'priority',
                'status'
            ]);


        if ($status) {
            $query->where('status_id', $status);
        }

        if ($priority) {
            $query->where('priority_id', $priority);
        }

        return $query->orderBy('id', $sort)->paginate($limit);
    }


    /**
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function read(int $id): mixed
    {
        if (!$task = Task::where('id' , $id)->with([
            'user',
            'priority',
            'status'
        ])
            ->first()) {

            throw new \Exception('ID не найден');
        }

        return $task;
    }


    /**
     * @param UpdateTaskRequest $request
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function update(UpdateTaskRequest $request, int $id)
    {
        $sanitized = $request->all();

        if (!$task = Task::find($id)) {
            throw new \Exception('задачи не сущевствует', 401);
        }

        $task->update($sanitized);

        return array('task_id' => $task->id);
    }


    /**
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function delete(int $id): mixed
    {
        if (!$task = Task::find($id)) {

            throw new \Exception('Задача с указаным ID не найдена');

        }

        $task->delete();

        return array('task_id' => $task->id);

    }

}
