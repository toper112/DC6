<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition()
    {
        $employeeIds = Employee::pluck('id')->toArray();

        return [
            'employee_id' => $this->faker->randomElement($employeeIds),
            'check_in' => $this->faker->dateTimeThisMonth(),
            'check_out' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
