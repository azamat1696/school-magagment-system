<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;
use App\Models\Qualification;
use App\Models\Student;

class QualificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qualification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'qualification_start_date' => $this->faker->date(),
            'departmnent_id' => Department::factory(),
            'ic_denetim_tarih' => $this->faker->dateTime(),
            'ic_denetim_user_id' => $this->faker->numberBetween(-100000, 100000),
            'depart_imza_end_date' => $this->faker->date(),
            'diplom_req_date' => $this->faker->date(),
            'diplom_confirm_date' => $this->faker->date(),
            'diplom_no' => $this->faker->word,
            'islem_sira_no' => $this->faker->word,
            'operator_user_id' => $this->faker->numberBetween(-100000, 100000),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
