<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); //
            $table->string('student_no')->unique(); //
            $table->enum('student_status',['Aktif','Pasif','OnKayitli','KaydiSilinmis','KayitDondurma'])->default('OnKayitli'); //
            $table->date('qualification_start_date')->nullable(); //
            $table->unsignedBigInteger('departmnent_id'); //
            $table->dateTime('ic_denetim_tarih')->nullable();
            $table->unsignedBigInteger('ic_denetim_user_id')->nullable();
            $table->date('depart_imza_end_date')->nullable(); //
            $table->date('diplom_req_date')->nullable(); //
            $table->date('diplom_confirm_date')->nullable(); //
            $table->string('diplom_no')->nullable(); //
            $table->string('islem_sira_no')->nullable(); //
            $table->enum('ogr_hakk',['HakkiVar','HakkiYok']); //
            $table->string('not_sistemi')->comment('listeden seçilecek'); //
            $table->date('ayrilma_tarihi')->nullable(); //
            $table->string('ayrilma_nedeni')->nullable()->comment('1.'); //
            $table->date('register_date')->nullable(); //
            $table->boolean('hazirlik_okudum')->nullable(); //
            $table->tinyInteger('hazirlik_donem_sayi')->nullable(); //
            $table->string('giris_turu')->default('sinavsız_gecis')->comment('(Def. Value “2-Sınavsız Geçiş”)'); //
            $table->string('giris_puan_turu')->nullable(); //
            $table->bigInteger('giris_puan')->nullable(); //
            $table->bigInteger('genel_not_ortalama')->nullable(); //
            $table->string('diploma_tur')->nullable(); //
            $table->bigInteger('diploma_not')->nullable(); //
            $table->string('notes')->nullable(); //
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('departmnent_id')->references('id')->on('departments');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ic_denetim_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('qualifications');
    }
}
