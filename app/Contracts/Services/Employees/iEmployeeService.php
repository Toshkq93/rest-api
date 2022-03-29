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

    /**
     * @param int $id
     * @return EmployeeDTO
     * @throws \Exception
     */
    public function show(int $id): EmployeeDTO;

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