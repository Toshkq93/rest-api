<?php

namespace Database\Seeders;

use Database\Seeders\Departments\DepartmentSeeder;
use Database\Seeders\Employees\EmployeeSeeder;
use Database\Seeders\Employees\GenderSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            GenderSeeder::class,
            EmployeeSeeder::class
        ]);
    }
}
