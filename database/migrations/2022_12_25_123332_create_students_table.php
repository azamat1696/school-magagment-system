<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //
            $table->string('surname'); //
            $table->string('other_names')->nullable(); //
            $table->string('identity_no'); //
            $table->string('passport_no'); //
            $table->enum('gender', ['Male','Female','others'])->default('others'); //
            $table->unsignedBigInteger('country_id'); //
            $table->foreign('country_id')->references('id')->on('countries'); //
            $table->string('blood_group'); //
            $table->date('birth_date'); //
            $table->string('place_of_birth'); //
            $table->string('mother_name'); //
            $table->string('father_name'); //
            $table->string('email')->nullable(); //
            $table->string('phone_no')->nullable(); //
            $table->string('phone_no_1')->nullable(); //
            $table->string('phone_no_2')->nullable(); //
            $table->string('address')->nullable(); //
            $table->string('notes')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('student_photo')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
