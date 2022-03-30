<?php

namespace App\Services\Departments;

use App\Contracts\Repositories\Departments\iDepartmentRepository;
use App\Contracts\Services\Departments\iDepartmentsService;
use App\DTO\Departments\DepartmentDTO;
use App\DTO\Departments\DepartmentsDTOCollection;
use App\Filters\Departments\StoreDepartmentFilter;

class DepartmentService implements iDepartmentsService
{
    public function __construct(
        private iDepartmentRepository $repository
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function getList(): DepartmentsDTOCollection
    {
        return $this->repository->getList();
    }

    /**
     * @inheritDoc
     */
    public function create(StoreDepartmentFilter $filter): DepartmentDTO
    {
        return $this->repository->create($filter);
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): DepartmentDTO
    {
        return $this->repository->show($id);
    }

    /**
     * @inheritDoc
     */
    public function update(StoreDepartmentFilter $filter): bool
    {
        return $this->repository->update($filter);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

}