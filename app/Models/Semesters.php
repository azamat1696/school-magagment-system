<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semesters extends Model
{
    use HasFactory;
    protected $fillable = [
      'DonemAdi',
      'Statu',
      'academic_years_id'
    ];
    public function academic_years(){
        return $this->belongsTo(AcademicYear::class,'academic_years_id');
    }
}
