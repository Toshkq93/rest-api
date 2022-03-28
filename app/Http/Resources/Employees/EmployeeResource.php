<?php

namespace App\Http\Resources\Employees;

use App\DTO\Employees\EmployeeDTO;
use App\Http\Resources\Genders\GenderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var EmployeeDTO $this */
        return [
            'id' => $this->getId(),
            'fio' => $this->getFio(),
            'salary' => $this->getSalary(),
            'geneder' => new GenderResource($this->getGender())
        ];
    }
}
