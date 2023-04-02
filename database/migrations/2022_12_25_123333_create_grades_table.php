<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('semester_id')->nullable();
            $table->unsignedBigInteger('grade')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('course_id')->references('id')->on('course')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('student')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('semester_id')->references('id')->on('semester')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('grades');
    }
}
