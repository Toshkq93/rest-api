<?php

namespace Database\Seeders\Employees;

use App\Models\Departments\Department;
use App\Models\Employees\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    protected $model = Employee::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory(50)
            ->create()
            ->each(function($user) {
                $randomFields= Department::inRandomOrder()->first();
                $user->departments()->attach($randomFields);
            });;
    }
}
