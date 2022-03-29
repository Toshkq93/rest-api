<?php

namespace App\Contracts\Repositories\Employees;

use App\DTO\Employees\EmployeeDTO;
use App\DTO\Employees\EmployeesDTOCollection;
use App\Filters\Employees\StoreEmployeeFilter;
use Exception;

interface iEmployeeRepository
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

    /**
     * @param int $employeeId
     * @return EmployeeDTO
     * @throws Exception
     */
    public function show(int $employeeId): EmployeeDTO;

    /**
     * @param StoreEmployeeFilter $filter
     * @return bool
     */
    public function update(StoreEmployeeFilter $filter): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}