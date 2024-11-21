<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $tabel = "courses" ; 

    public function video()  {
        return $this->hasMany(video::class) ;
    }

    // public function comment(){

    //     return $this->hasMany(comment::class) ;
    // }
}
