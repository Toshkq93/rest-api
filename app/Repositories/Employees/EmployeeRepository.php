<?php

namespace App\Repositories\Employees;

use App\Contracts\Repositories\Employees\iEmployeeRepository;
use App\DTO\Employees\EmployeeDTO;
use App\DTO\Employees\EmployeesDTOCollection;
use App\DTO\Genders\GenderDTO;
use App\Models\Employee;
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
     * @param Employee $employees
     * @return EmployeesDTOCollection
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    private function toDTOCollection(Collection $employees): EmployeesDTOCollection
    {
        $list = [];

        foreach ($employees as $employee){
            $list[] = $this->toDTO($employee);
        }

        return new EmployeesDTOCollection(
            items: $list
        );
    }

    private function toDTO(Employee $employee): EmployeeDTO
    {
        return (new EmployeeDTO($employee->toArray()))
            ->setGender(new GenderDTO($employee->gender->toArray()));

    }
}