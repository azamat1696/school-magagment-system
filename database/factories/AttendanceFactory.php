<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Section;
use App\Models\User;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section_id' => Section::factory(),
            'student_id' => $this->faker->numberBetween(-100000, 100000),
            'Status' => $this->faker->boolean,
            'assigned_date' => $this->faker->date(),
            'user_id' => User::factory(),
            'course_id' => Course::factory(),
            'created_at' => $this->faker->numberBetween(-100000, 100000),
            'updated_at' => $this->faker->numberBetween(-100000, 100000),
        ];
    }
}
