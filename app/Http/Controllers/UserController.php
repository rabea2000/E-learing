<?php

namespace App\Http\Controllers;

use App\file\Visitor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {

        $userquery = User::query();
        $online_users_id = Visitor::getOnlineUser();

        if (!$request->query()) {
            $userquery = $userquery;
        }

        if ($request->has('class')) {
            $classes = [];
            foreach ($request->query('class') as $class) {
                $classes[] = $class;
            }
            $userquery = $userquery->whereIn("classes_id", $classes);
        }


        if ($request->query("search")) {
            $userquery = $userquery->whereAny(['first_name', 'last_name'], 'like', "%{$request->query("search")}%");
        }

        $users_paginate = $userquery->paginate(20)->withQueryString();

        foreach ($users_paginate  as  $user_paginate) {
            if (key_exists($user_paginate->id, $online_users_id->toArray())) {
                $user_paginate->is_online = true;
                
            }

   
        }
    
        return view('admin.users', [
            'users' =>  $users_paginate  ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

      
        
        $paid_users=  DB::table('paid_users')
        ->where("user_id" , "=" , $user->id)
        ->first() ;
                 
        
        
        
       $devices =  Visitor::allowedDevice($user) ; 
       $access_denied = DB::table('access_denied')
       ->where("user_id" , '=' , $user->id)
       ->get() ;
       
      

       if (isset($devices)){
            $user =  $user->setAttribute("allowed_devices" , $devices->toArray()) ;
       }
       if(isset($access_denied)){
        $user =  $user->setAttribute("access_denied" , $access_denied->toArray()) ;
       }
      
        if (isset($paid_users)){
            $user =  $user->setAttribute("paid_user" , $paid_users) ;
        }
   
     
       return view('admin.user',[
          'user' => $user 
       ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
