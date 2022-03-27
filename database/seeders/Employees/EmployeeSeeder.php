<?php

namespace Database\Seeders\Employees;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory(50)
            ->hasAttached(Department::inRandomOrder()->first())
            ->create();
    }
}
