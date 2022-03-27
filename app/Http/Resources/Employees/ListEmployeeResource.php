<?php

namespace App\Http\Resources\Employees;

use App\DTO\Employees\EmployeeDTO;
use App\Http\Resources\Genders\GenderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ListEmployeeResource extends JsonResource
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
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'patronymic' => $this->getPatronymic(),
            'salary' => $this->getSalary(),
            'geneder' => new GenderResource($this->getGender())
        ];
    }
}
