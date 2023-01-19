<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'academic_years_id',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'academic_years_id' => 'integer',
        'status' => 'boolean',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'id', 'semester_id');
    }

    public function academic_years()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
