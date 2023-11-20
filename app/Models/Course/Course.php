<?php

namespace App\Models\Course;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

//    public function lessons(){
//        return $this->hasMany(Lesson::class);
//    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
