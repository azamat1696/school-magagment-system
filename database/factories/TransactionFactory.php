<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;
use App\Models\Student;
use App\Models\Transaction;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_no' => $this->faker->word,
            'description' => $this->faker->text,
            'student_id' => Student::factory(),
            'user_id' => $this->faker->numberBetween(-100000, 100000),
            'department_id' => Department::factory(),
            'semester_id' => $this->faker->numberBetween(-100000, 100000),
            'currency_type' => $this->faker->word,
            'islem_tarih' => $this->faker->date(),
            'vade_tarih' => $this->faker->date(),
            'amount_payed' => $this->faker->numberBetween(-100000, 100000),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->numberBetween(-100000, 100000),
        ];
    }
}
