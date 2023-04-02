<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('section_no');
            $table->date('theory_start_date')->nullable();
            $table->date('theory_end_date')->nullable();
            $table->date('practice_start_date')->nullable();
            $table->date('practice_end_date')->nullable();
            $table->dateTime('ic_denetim_tarih')->nullable();
            $table->foreign('ic_denetim_user_id')->references('id')->on('users');
            $table->date('ders_imza_end_date')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('user_id')->nullable()->comment('en son işlem yapan kişi');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('instructor_user_id')->nullable();
            $table->unsignedBigInteger('ic_denetim_user_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('instructor_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('ic_denetim_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');



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
        Schema::dropIfExists('sections');
    }
}
