<?php

namespace App\Contracts\Repositories\Departments;

use App\DTO\Departments\DepartmentDTO;
use App\DTO\Departments\DepartmentsDTOCollection;
use App\Exceptions\EntityNotFoundException;
use App\Filters\Departments\StoreDepartmentFilter;

interface iDepartmentRepository
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
     * @param int $departmentId
     * @return bool
     * @throws EntityNotFoundException
     */
    public function delete(int $departmentId): bool;

}