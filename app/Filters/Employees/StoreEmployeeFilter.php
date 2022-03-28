<?php

namespace App\Filters\Employees;

use Spatie\DataTransferObject\DataTransferObject;

class StoreEmployeeFilter extends DataTransferObject
{
    public string $first_name;
    public string $last_name;
    public string $patronymic;
    public int $salary;
    public null|int $gender_id;
    public array $department_ids;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @return null|int
     */
    public function getGenderId(): ?int
    {
        return $this->gender_id;
    }

    /**
     * @return array
     */
    public function getDepartmentIds(): array
    {
        return $this->department_ids;
    }
}