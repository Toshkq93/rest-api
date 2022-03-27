<?php

namespace Database\Seeders\Employees;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
