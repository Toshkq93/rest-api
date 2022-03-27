<?php

namespace App\DTO\Employees;

use App\DTO\Genders\GenderDTO;
use Spatie\DataTransferObject\DataTransferObject;

class EmployeeDTO extends DataTransferObject
{
    public int $id;
    public string $first_name;
    public string $last_name;
    public string $patronymic;
    public int $salary;
    public null|GenderDTO $gender;

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
     * @return GenderDTO
     */
    public function getGender(): GenderDTO
    {
        return $this->gender;
    }

    /**
     * @param GenderDTO $gender
     * @return $this
     */
    public function setGender(GenderDTO $gender): self
    {
        $this->gender = $gender;
        return $this;
    }
}