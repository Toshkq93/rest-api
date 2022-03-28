<?php

namespace App\Services\Employees;

use App\Contracts\Repositories\Employees\iEmployeeRepository;
use App\Contracts\Services\Employees\iEmployeeService;
use App\DTO\Employees\EmployeeDTO;
use App\DTO\Employees\EmployeesDTOCollection;
use App\Filters\Employees\StoreEmployeeFilter;

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

    /**
     * @param StoreEmployeeFilter $filter
     * @return EmployeeDTO
     */
    public function create(StoreEmployeeFilter $filter):EmployeeDTO
    {
        return $this->repository->create($filter);
    }

}