<?php

namespace App\Models\Course;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function rows(){
        return $this->hasMany(Row::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
