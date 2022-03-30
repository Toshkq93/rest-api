<?php

namespace App\DTO\Departments;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class DepartmentsDTOCollection extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: DepartmentDTO::class)]
    public array $items;

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

}