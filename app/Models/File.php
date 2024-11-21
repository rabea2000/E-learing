<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; 
use Illuminate\Http\Request;

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

    public function scopeSearch(Builder $query )
    {
        $search =   request()->input("search")  ; 
       return $query->when( $search  ,function(Builder $query , String $search){
            $query->whereAny(['name' , 'description' ] , 'like' , "%{$search}%"); 
    }) ;
    }
}
