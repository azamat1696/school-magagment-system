<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('BIRIMID-MEB',100)->nullable();
            $table->string('BIRIMID-ONGEL',100)->nullable();
            $table->string('KimlikNo',20)->nullable();
            $table->string('StudentPhoto',20)->nullable();
            $table->string('PassportNo',20)->nullable();
            $table->string('OgrenciNo',20)->unique();
            $table->string('DiplomaAdi',100);
            $table->string('DiplomaSoyadi',100);
            $table->string('DigerIsimleri',100);
            $table->string('AnneAdi')->nullable();
            $table->string('BabaAdi')->nullable();
            $table->enum('Cinsiyet',['Erkek','Kadin']);
            $table->string('Uyruk');
            $table->string('KanGurubu');
            $table->string('DogunYeri',30);
            $table->date('DogunTarihi');
            $table->string('TelefonNo',15);
            $table->string('KKTCAdres');
            $table->string('Email',50);
            $table->string('Sinif',20);
            $table->enum('OgrenciStatu',['Aktif','Pasif','OnKayitli','KaydiSilinmis','KayitDondurma'])->default('OnKayitli');
            $table->enum('OgrenciHakki',['HakkiVar','HakkiYok']);
            $table->date('OgrenciHakkiTarih');
            $table->string('AktifDonemNo');
            $table->string('NotSistemi');
            $table->string('BolumYili');
            $table->date('AyrilmaTarihi');
            $table->text('AyrilmaNedeni');
            $table->boolean('HazirlikOkudum')->default(false);
            $table->integer('HazirlikDonemSayi')->default(1);
            $table->string('GirisTuru')->default(2)->comment('2-Sinavsiz gecis');// sorulacak alan
            $table->string('GirisPuanTuru');
            $table->integer('GirisPuani')->default(0);
            $table->integer('GenelNotOratalama')->default(0);
            $table->integer('DiplomaTuru')->default(0);
            $table->integer('DiplomaNot')->default(0);
            $table->string('TelNoYakini_1',15)->nullable();
            $table->string('TelNoYakini_2',15)->nullable();
            $table->text('Notlar')->nullable();
            $table->boolean('Status')->default(true);
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('students');
    }
};
