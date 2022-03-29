<?php

namespace App\Repositories\Employees;

use App\Contracts\Repositories\Employees\iEmployeeRepository;
use App\DTO\Employees\EmployeeDTO;
use App\DTO\Employees\EmployeesDTOCollection;
use App\DTO\Genders\GenderDTO;
use App\Filters\Employees\StoreEmployeeFilter;
use App\Models\Employees\Employee;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class EmployeeRepository implements iEmployeeRepository
{
    /**
     * @inheritDoc
     */
    public function getList(): EmployeesDTOCollection
    {
        return $this->toDTOCollection(
            Employee::with('gender')->get()
        );
    }

    /**
     * @inheritDoc
     */
    public function create(StoreEmployeeFilter $filter): EmployeeDTO
    {
        $employee = Employee::create([
            'first_name' => $filter->getFirstName(),
            'last_name' => $filter->getLastName(),
            'patronymic' => $filter->getPatronymic(),
            'salary' => $filter->getSalary(),
            'gender_id' => $filter->getGenderId(),
        ]);

        $employee->departments()->attach($filter->getDepartmentIds());

        return $this->toDTO($employee);
    }

    /**
     * @inheritDoc
     */
    public function show(int $employeeId): EmployeeDTO
    {
        return $this->toDTO($this->findOrExeption($employeeId));
    }

    /**
     * @inheritDoc
     */
    public function update(StoreEmployeeFilter $filter): bool
    {
        $employee = $this->findOrExeption($filter->getEmployeeId());
        $employee->update([
            'first_name' => $filter->getFirstName(),
            'last_name' => $filter->getLastName(),
            'patronymic' => $filter->getPatronymic(),
            'gender_id' => $filter->getGenderId(),
            'salary' => $filter->getSalary()
        ]);
        $employee->departments()->sync($filter->getDepartmentIds());

        return true;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        $employee = $this->findOrExeption($id);
        $employee->delete();
        $employee->departments()->sync([]);

        return true;
    }

    /**
     * @param int $employeeId
     * @return Employee
     * @throws Exception
     */
    private function findOrExeption(int $employeeId): Employee
    {
        if (!$employee = Employee::find($employeeId)){
            throw new Exception("Employee #{$employeeId} not found", Response::HTTP_NOT_FOUND);
        }

        return $employee;
    }

    /**
     * @param Employee $employees
     * @return EmployeesDTOCollection
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    private function toDTOCollection(Collection $employees): EmployeesDTOCollection
    {
        $list = [];

        foreach ($employees as $employee) {
            $list[] = $this->toDTO($employee);
        }

        return new EmployeesDTOCollection(
            items: $list
        );
    }

    private function toDTO(Employee $employee): EmployeeDTO
    {
        $employeeDTO = new EmployeeDTO(
            id: $employee->id,
            fio: $employee->fio,
            salary: $employee->salary
        );

        $employeeDTO->setGender(!empty($employee->gender) ? new GenderDTO($employee->gender->toArray()) : null);

        return $employeeDTO;

    }
}