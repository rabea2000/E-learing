<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;

    
    public   function episodeNumber() {
        return static::orderByDesc("episode")->first()->episode ;
    }

    public function course()  {
       return  $this->belongsTo(Course::class) ;
    }

    public function  comment()  {
        return $this->hasMany(Comment::class) ;
    }
}
