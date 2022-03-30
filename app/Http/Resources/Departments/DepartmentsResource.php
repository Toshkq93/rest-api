<?php

namespace App\Http\Resources\Departments;

use App\DTO\Departments\DepartmentDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var DepartmentDTO $this */
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'countEmployees' => $this->getCountEmployees(),
            'maxSalary' => $this->getMaxSalary()
        ];
    }
}
