<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use App\Models\User;

class GradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'semester_id' => $this->faker->numberBetween(-100000, 100000),
            'grade' => $this->faker->numberBetween(-100000, 100000),
            'user_id' => User::factory(),
            'column_7' => $this->faker->numberBetween(-100000, 100000),
        ];
    }
}
