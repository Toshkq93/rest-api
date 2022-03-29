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
     * @inheritDoc
     */
    public function getList(): EmployeesDTOCollection
    {
        return $this->repository->getList();
    }

    /**
     * @inheritDoc
     */
    public function create(StoreEmployeeFilter $filter):EmployeeDTO
    {
        return $this->repository->create($filter);
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): EmployeeDTO
    {
        return $this->repository->show($id);
    }

    /**
     * @inheritDoc
     */
    public function update(StoreEmployeeFilter $filter): bool
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