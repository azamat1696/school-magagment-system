<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentCourdeRecord;

class StudentCourdeRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentCourdeRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'section_id' => Section::factory(),
            'semester_id' => Semester::factory(),
            'course_id' => Course::factory(),
            'created_at' => $this->faker->dateTime(),
            'udated_at' => $this->faker->dateTime(),
        ];
    }
}
