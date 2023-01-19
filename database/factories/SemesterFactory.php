<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AcademicYear;
use App\Models\Semester;

class SemesterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Semester::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'academic_year_id' => AcademicYear::factory(),
            'status' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime(),
            'udated_at' => $this->faker->dateTime(),
        ];
    }
}
