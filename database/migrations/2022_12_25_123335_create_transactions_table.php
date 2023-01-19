<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_no'); //
            $table->string('description')->nullable(); //
            $table->unsignedBigInteger('student_id'); //
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('qualification_id');
            $table->foreign('qualification_id')->references('id')->on('qualifications');
            $table->unsignedBigInteger('user_id')->comment('en son işlem yapan');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->string('currency_type');
            $table->date('islem_tarih')->nullable();
            $table->date('vade_tarih')->nullable();
            $table->string('transaction_type');
            $table->boolean('status')->default(0);
            $table->decimal('amount_payed')->comment('evrak tutarı');
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
        Schema::dropIfExists('transactions');
    }
}
