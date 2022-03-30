<?php

namespace App\Repositories\Departments;

use App\Contracts\Repositories\Departments\iDepartmentRepository;
use App\DTO\Departments\DepartmentDTO;
use App\DTO\Departments\DepartmentsDTOCollection;
use App\Exceptions\EntityNotFoundException;
use App\Filters\Departments\StoreDepartmentFilter;
use App\Models\Departments\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class DepartmentRepository implements iDepartmentRepository
{
    /**
     * @inheritDoc
     */
    public function getList(): DepartmentsDTOCollection
    {
        return $this->toDTOCollection(
            Department::get()
        );
    }

    /**
     * @inheritDoc
     */
    public function create(StoreDepartmentFilter $filter): DepartmentDTO
    {
        $department = Department::create([
            'name' => $filter->getName()
        ]);

        return $this->toDTO($department);
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): DepartmentDTO
    {
        return $this->toDTO(
            $this->findOrExeption($id)
        );
    }

    /**
     * @param StoreDepartmentFilter $filter
     * @return bool
     */
    public function update(StoreDepartmentFilter $filter): bool
    {
        $department = $this->findOrExeption($filter->getId());
        $department->update([
            'name' => $filter->getName()
        ]);

        return true;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $departmentId): bool
    {
        $department = $this->findOrExeption($departmentId);
        if ($department->countEmployees()){
            throw new EntityNotFoundException("Department #{$departmentId} have employees", Response::HTTP_NOT_FOUND);
        }

        return $department->delete();
    }

    /**
     * @param int $departmentId
     * @return Department
     * @throws EntityNotFoundException
     */
    private function findOrExeption(int $departmentId): Department
    {
        if (!$employee = Department::find($departmentId)) {
            throw new EntityNotFoundException("Department #{$departmentId} not found", Response::HTTP_NOT_FOUND);
        }

        return $employee;
    }

    /**
     * @param Collection $employees
     * @return DepartmentsDTOCollection
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    private function toDTOCollection(Collection $departments): DepartmentsDTOCollection
    {
        $list = [];

        foreach ($departments as $department) {
            $list[] = $this->toDTO($department);
        }

        return new DepartmentsDTOCollection(
            items: $list
        );
    }

    /**
     * @param Department $department
     * @return DepartmentDTO
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    private function toDTO(Department $department): DepartmentDTO
    {
        $departmentDTO = new DepartmentDTO(
            id: $department->id,
            name: $department->name,
            countEmployees: $department->countEmployees() ?? 0,
            maxSalary: $department->maxSalary() ?? 0
        );

        return $departmentDTO;
    }
}