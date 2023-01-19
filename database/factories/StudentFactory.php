<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'surname' => $this->faker->numberBetween(-100000, 100000),
            'other_names' => $this->faker->numberBetween(-100000, 100000),
            'student_no' => $this->faker->word,
            'identity_no' => $this->faker->word,
            'passport_no' => $this->faker->word,
            'gender' => $this->faker->randomElement(/** enum_attributes **/),
            'country_id' => $this->faker->numberBetween(-100000, 100000),
            'blood_group' => $this->faker->word,
            'birth_date' => $this->faker->date(),
            'place_of_birth' => $this->faker->word,
            'mother_name' => $this->faker->word,
            'father_name' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'phone_no' => $this->faker->word,
            'phone_no_1' => $this->faker->word,
            'phone_no_2' => $this->faker->word,
            'address' => $this->faker->word,
            'student_status' => $this->faker->word,
            'ogr_hakk' => $this->faker->word,
            'not_sistemi' => $this->faker->word,
            'ayrilma_tarihi' => $this->faker->date(),
            'ayrilma_nedeni' => $this->faker->word,
            'register_date' => $this->faker->date(),
            'hazirlik_okudum' => $this->faker->boolean,
            'hazirlik_donem_sayi' => $this->faker->numberBetween(-8, 8),
            'giris_turu' => $this->faker->word,
            'giris_puan_turu' => $this->faker->word,
            'giris_puan' => $this->faker->numberBetween(-100000, 100000),
            'genel_not_ortalama' => $this->faker->numberBetween(-100000, 100000),
            'notes' => $this->faker->word,
            'user_id' => $this->faker->numberBetween(-100000, 100000),
            'diploma_tur' => $this->faker->word,
            'diploma_not' => $this->faker->numberBetween(-100000, 100000),
            'status' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
