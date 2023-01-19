<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'section_no',
        'course_id',
        'instructor_user_id',
        'theory_start_date',
        'theory_end_date',
        'practice_start_date',
        'practice_end_date',
        'ic_denetim_tarih',
        'ic_denetim_user_id',
        'ders_imza_end_date',
        'user_id',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'instructor_user_id' => 'integer',
        'theory_start_date' => 'date',
        'theory_end_date' => 'date',
        'practice_start_date' => 'date',
        'practice_end_date' => 'date',
        'ic_denetim_tarih' => 'datetime',
        'ic_denetim_user_id' => 'integer',
        'ders_imza_end_date' => 'date',
        'user_id' => 'integer',
        'status' => 'boolean'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function instructorUser()
    {
        return $this->belongsTo(User::class);
    }

    public function icDenetimUser()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
