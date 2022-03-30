<?php

namespace App\Filters\Departments;

use Spatie\DataTransferObject\DataTransferObject;

class StoreDepartmentFilter extends DataTransferObject
{
    public null|int $id;
    public string $name;

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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}