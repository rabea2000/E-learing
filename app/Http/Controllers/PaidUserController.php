<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Mockery\Expectation;

class PaidUserController extends Controller
{
    public function store(  $user_id, Request $request , ){
  
        $request->validate([
      
            'amount' => ['required' , 'numeric' ] ,
            'information' =>['required' , 'max:1000'] 
        ]);

        $is_paid_user = DB::table("paid_users") 
        ->where('user_id' ,'=' , $user_id ) 
        ->exists() ; 

        if ($is_paid_user) {
            
            throw ValidationException::withMessages([
                'user' => 'This user has already paid.'
            ]);
        }


         
        DB::table('paid_users')
        ->insert([
            'user_id' => $user_id , 
            'amount' => $request->amount ,
            'information' =>$request->information ,
            'created_at' => date('Y-m-d H:i:s') ,
            'updated_at' => date('Y-m-d H:i:s') 

        ]) ; 

        return redirect()->back() ;
    }

    public function destroy($user_id){


    }

}
