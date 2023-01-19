<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Section;
use App\Models\User;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'section_no' => $this->faker->word,
            'course_id' => Course::factory(),
            'instructor_user_id' => User::factory(),
            'theory_start_date' => $this->faker->date(),
            'theory_end_date' => $this->faker->date(),
            'practice_start_date' => $this->faker->date(),
            'practice_end_date' => $this->faker->date(),
            'ic_denetim_tarih' => $this->faker->dateTime(),
            'ic_denetim_user_id' => User::factory(),
            'ders_imza_end_date' => $this->faker->date(),
            'user_id' => User::factory(),
            'status' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
