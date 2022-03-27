<?php

namespace App\DTO\Employees;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class EmployeesDTOCollection extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: EmployeeDTO::class)]
    public array $items;

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}