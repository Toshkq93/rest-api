<?php

namespace App\Contracts\Services\Employees;

use App\DTO\Employees\EmployeeDTO;
use App\DTO\Employees\EmployeesDTOCollection;
use App\Filters\Employees\StoreEmployeeFilter;

interface iEmployeeService
{
    /**
     * @return EmployeesDTOCollection
     */
    public function getList(): EmployeesDTOCollection;

    /**
     * @param StoreEmployeeFilter $filter
     * @return EmployeeDTO
     */
    public function create(StoreEmployeeFilter $filter):EmployeeDTO;

}