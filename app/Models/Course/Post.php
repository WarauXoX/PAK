<?php

namespace App\Models\Course;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function row(){
        return $this->belongsTo(Row::class);
    }
    public function posttext(){
        return $this->hasOne(PostText::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
