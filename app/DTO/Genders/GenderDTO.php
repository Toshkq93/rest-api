<?php

namespace App\DTO\Genders;

use Spatie\DataTransferObject\DataTransferObject;

class GenderDTO extends DataTransferObject
{
    public null|int $id;
    public null|string $name;

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }
}