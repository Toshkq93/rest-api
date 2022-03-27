<?php

namespace App\DTO\Genders;

use Spatie\DataTransferObject\DataTransferObject;

class GenderDTO extends DataTransferObject
{
    public int $id;
    public string $name;

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
}