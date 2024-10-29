<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidUsers extends Model
{
    use HasFactory;
     
    protected $table = 'paid_users' ; 
    
    public function user()  {
        return $this->belongsTo(User::class) ; 
    }
    
}
