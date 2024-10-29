<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable =      [   'name' ,
    'description' ,
    "url" ,
    "classes_id" ];

    public function classes(){
        return $this->hasOne(Classes::class);

    }
}
