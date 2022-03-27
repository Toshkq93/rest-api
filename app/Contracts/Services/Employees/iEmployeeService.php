<?php

namespace App\Contracts\Services\Employees;

use App\DTO\Employees\EmployeesDTOCollection;
use App\Models\Employee;

interface iEmployeeService
{
    /**
     * @return EmployeesDTOCollection
     */
    public function getList(): EmployeesDTOCollection;

}