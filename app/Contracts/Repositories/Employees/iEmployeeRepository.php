<?php

namespace App\Contracts\Repositories\Employees;

use App\DTO\Employees\EmployeesDTOCollection;
use App\Models\Employee;

interface iEmployeeRepository
{
    /**
     * @return EmployeesDTOCollection
     */
    public function getList(): EmployeesDTOCollection;

}