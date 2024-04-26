<?php

namespace App\Http\Resources;

use App\Http\Resources\UserConfiguration\UserConfigurationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'patronymic' => $this->patronymic,
            'phone'      => $this->phone,
            'role'       => $this->getRoleNames()->first() ?? null,
        ];
    }
}
