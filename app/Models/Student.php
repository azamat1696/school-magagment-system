<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'other_names',
        'student_no',
        'identity_no',
        'passport_no',
        'gender',
        'country_id',
        'blood_group',
        'birth_date',
        'place_of_birth',
        'mother_name',
        'father_name',
        'email',
        'phone_no',
        'phone_no_1',
        'phone_no_2',
        'address',
        'user_id',
        'notes',
        'student_photo',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'surname' => 'string',
        'other_names' => 'string',
        'country_id' => 'integer',
        'birth_date' => 'date',
        'user_id' => 'integer',
        'status' => 'boolean',
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class, 'student_id', 'id');
    }
    public function country_related(){
        return $this->belongsTo(Countries::class,'country_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function qualification(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Qualification','student_id','id');
    }
}

