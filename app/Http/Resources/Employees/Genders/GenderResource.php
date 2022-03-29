<?php

namespace App\Http\Resources\Employees\Genders;

use App\DTO\Genders\GenderDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class GenderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var GenderDTO $this */
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }
}
