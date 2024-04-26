<?php

namespace App\Http\Requests\Task;

use App\Http\Requests\BaseRequest;

class UpdateTaskRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status_id' => 'string|exists:dictionaries_status,id',
            'priority_id' => 'string|exists:dictionaries_priority,id',
            'description' => 'string',
            'name' => 'string',
        ];
    }
}
