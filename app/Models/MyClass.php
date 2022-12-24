<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'class_group_id'
    ];
    public function class_group(){
        return $this->belongsTo(ClassGroups::class,'class_group_id');
    }
}
