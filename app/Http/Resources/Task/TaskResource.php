<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends  JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'user_id'           => $this->user_id,
            'user_name'         => $this->user->name,
            'status'            => $this->status->name,
            'priority'          => $this->priority->name,
            'name'              => $this->name,
            'description'       => $this->description,
            'created_at'        => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'        => $this->updated_at->format('Y-m-d H:i:s'),
            ];
    }
}
