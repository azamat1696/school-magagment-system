<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
      'BIRIMID-MEB',
      'BIRIMID-ONGEL',

      'KimlikNo', //
      'PassportNo',//
      'OgrenciNo',
      'DiplomaAdi',//
      'DiplomaSoyadi',//
      'DigerIsimleri',//
      'AnneAdi',//
      'BabaAdi', //
      'Cinsiyet',//
      'Uyruk', //
      'KanGurubu',//
      'DogunYeri',//
      'DogunTarihi',//
      'TelefonNo',
      'KKTCAdres',
      'Email', //
      'Sinif',
      'OgrenciStatu',
      'OgrenciHakki',
      'OgrenciHakkiTarih',
      'AktifDonemNo',
      'NotSistemi',
      'BolumYili',
      'AyrilmaTarihi',
      'HazirlikOkudum',
      'HazirlikDonemSayi',
      'GirisTuru',
      'GirisPuanTuru',
      'GirisPuani',
      'GenelNotOratalama',
      'DiplomaTuru',
      'DiplomaNot',
      'TelNoYakini_1',
      'TelNoYakini_2',
      'Status',//
      'Notlar',
      'user_id',
      'StudentPhoto'
    ];
}
