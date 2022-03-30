<?php

namespace App\DTO\Departments;

use Spatie\DataTransferObject\DataTransferObject;

class DepartmentDTO extends DataTransferObject
{
    public int $id;
    public string $name;
    public int $countEmployees;
    public $maxSalary;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCountEmployees(): int
    {
        return $this->countEmployees;
    }

    /**
     * @return mixed
     */
    public function getMaxSalary()
    {
        return $this->maxSalary;
    }
}