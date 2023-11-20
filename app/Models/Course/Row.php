<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course\Lesson;
use App\Models\Course\Post;

class Row extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
