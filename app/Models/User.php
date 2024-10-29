<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\file\Visitor ;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable   ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        "user_name",
        'email',
        'password',
        "classes_id",
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function getFullNameAttribute(){

        return "{$this->first_name} {$this->last_name}"; 
    }

    public function getPlaceHolderAttribute(){
     
        $firstInitial = mb_substr($this->first_name, 0, 1);
        $lastInitial = mb_substr($this->last_name, 0, 1);
        return "{$firstInitial} {$lastInitial}";

        
    }


 

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

 
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
