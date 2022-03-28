<?php

namespace App\Repositories\Employees;

use App\Contracts\Repositories\Employees\iEmployeeRepository;
use App\DTO\Employees\EmployeeDTO;
use App\DTO\Employees\EmployeesDTOCollection;
use App\DTO\Genders\GenderDTO;
use App\Filters\Employees\StoreEmployeeFilter;
use App\Models\Employees\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository implements iEmployeeRepository
{
    /**
     * @return EmployeesDTOCollection
     */
    public function getList(): EmployeesDTOCollection
    {
        return $this->toDTOCollection(
            Employee::with('gender')->get()
        );
    }

    /**
     * @param StoreEmployeeFilter $filter
     * @return EmployeeDTO
     */
    public function create(StoreEmployeeFilter $filter):EmployeeDTO
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
        $employeeDTO  = new EmployeeDTO(
            id: $employee->id,
            fio: $employee->fio,
            salary: $employee->salary
        );

        $employeeDTO->setGender(!empty($employee->gender) ? new GenderDTO($employee->gender->toArray()): null);

        return $employeeDTO;

    }
}