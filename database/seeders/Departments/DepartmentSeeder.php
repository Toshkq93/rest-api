<?php

namespace Database\Seeders\Departments;

use App\Models\Departments\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory(50)
            ->create();
    }
}
