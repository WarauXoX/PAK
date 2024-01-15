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

    public function rows(){
        return $this->belongsTo(Row::class);
    }
    public function posttexts(){
        return $this->belongsTo(PostText::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
