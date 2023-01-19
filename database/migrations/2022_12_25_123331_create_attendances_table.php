<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('section');
            $table->bigInteger('student_id');
            $table->boolean('Status');
            $table->date('assigned_date');
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->bigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('course');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
