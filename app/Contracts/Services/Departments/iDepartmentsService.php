<?php

namespace App\Contracts\Services\Departments;

use App\DTO\Departments\DepartmentDTO;
use App\DTO\Departments\DepartmentsDTOCollection;
use App\Filters\Departments\StoreDepartmentFilter;

interface iDepartmentsService
{
    /**
     * @return DepartmentsDTOCollection
     */
    public function getList(): DepartmentsDTOCollection;

    /**
     * @param StoreDepartmentFilter $filter
     * @return DepartmentDTO
     */
    public function create(StoreDepartmentFilter $filter): DepartmentDTO;

    /**
     * @param int $id
     * @return DepartmentDTO
     */
    public function show(int $id): DepartmentDTO;

    /**
     * @param StoreDepartmentFilter $filter
     * @return bool
     */
    public function update(StoreDepartmentFilter $filter): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}