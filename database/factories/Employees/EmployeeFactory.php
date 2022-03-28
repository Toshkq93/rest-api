<?php

namespace Database\Factories\Employees;

use App\Models\Employees\Employee;
use App\Models\Employees\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'patronymic' => $this->faker->lastName(),
            'salary' => $this->faker->numberBetween(1000, 2000),
            'gender_id' => Gender::inRandomOrder()->first(),
        ];
    }
}
