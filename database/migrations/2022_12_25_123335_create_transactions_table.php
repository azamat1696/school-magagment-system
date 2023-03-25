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
            $table->unsignedBigInteger('qualification_id');
            $table->unsignedBigInteger('user_id')->comment('en son işlem yapan');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('semester_id');
            $table->string('currency_type');
            $table->date('islem_tarih')->nullable();
            $table->date('vade_tarih')->nullable();
            $table->string('transaction_type');
            $table->boolean('status')->default(0);
            $table->decimal('amount_payed')->comment('evrak tutarı');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('qualification_id')->references('id')->on('qualifications')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
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
