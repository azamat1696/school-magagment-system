<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_no',
        'student_id',
        'qualification_start_date',
        'departmnent_id',
        'ic_denetim_tarih',
        'ic_denetim_user_id',
        'depart_imza_end_date',
        'diplom_req_date',
        'diplom_confirm_date',
        'diplom_no',
        'islem_sira_no',
        'student_status',
        'ogr_hakk',
        'not_sistemi',
        'ayrilma_tarihi',
        'ayrilma_nedeni',
        'register_date',
        'hazirlik_okudum',
        'hazirlik_donem_sayi',
        'giris_turu',
        'giris_puan_turu',
        'giris_puan',
        'genel_not_ortalama',
        'notes',
        'status',
        'diploma_tur',
        'diploma_not',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
         'student_id' => 'integer',
        'qualification_start_date' => 'date',
        'departmnent_id' => 'integer',
        'ic_denetim_tarih' => 'datetime',
        'ic_denetim_user_id' => 'integer',
        'depart_imza_end_date' => 'date',
        'diplom_req_date' => 'date',
        'diplom_confirm_date' => 'date',
        'operator_user_id' => 'integer',
        'ayrilma_tarihi' => 'date',
        'register_date' => 'date',
        'hazirlik_okudum' => 'boolean',
        'hazirlik_donem_sayi' => 'integer',
        'giris_puan' => 'integer',
        'genel_not_ortalama' => 'integer',
        'diploma_not' => 'integer',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function departmnent()
    {
        return $this->belongsTo(Department::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
