<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    

    public function file(){
        return $this->belongsTo(File::class) ;
    }

    public function course(){
        return $this->belongsTo(Course::class) ;
    }
}
