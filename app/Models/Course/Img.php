<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
