<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public function video(){

        return $this->belongsTo(video::class) ; 
    }

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function reply(){

        return $this->hasMany(reply::class) ; 
    }
}
