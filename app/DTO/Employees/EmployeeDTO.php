<?php

namespace App\DTO\Employees;

use App\DTO\Genders\GenderDTO;
use Spatie\DataTransferObject\DataTransferObject;

class EmployeeDTO extends DataTransferObject
{
    public int $id;
    public string $fio;
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
    public function getFio(): string
    {
        return $this->fio;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @return null|GenderDTO
     */
    public function getGender(): ?GenderDTO
    {
        return $this->gender;
    }

    /**
     * @param GenderDTO|null $gender
     */
    public function setGender(?GenderDTO $gender): void
    {
        $this->gender = $gender;
    }
}