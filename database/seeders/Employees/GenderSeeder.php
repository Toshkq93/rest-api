<?php

namespace Database\Seeders\Employees;

use App\Models\Employees\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            ['name' => 'Мужской'],
            ['name' => 'Женский'],
        ];

        Gender::insert($genders);
    }
}
