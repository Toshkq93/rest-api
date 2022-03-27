<?php

namespace App\Services\Employees;

use App\Contracts\Repositories\Employees\iEmployeeRepository;
use App\Contracts\Services\Employees\iEmployeeService;
use App\DTO\Employees\EmployeesDTOCollection;

class EmployeeService implements iEmployeeService
{
    public function __construct(
        private iEmployeeRepository $repository
    )
    {
    }

    /**
     * @return EmployeesDTOCollection
     */
    public function getList(): EmployeesDTOCollection
    {
        return $this->repository->getList();
    }

}