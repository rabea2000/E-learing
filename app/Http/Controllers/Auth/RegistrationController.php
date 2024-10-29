<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Stevebauman\Location\Facades\Location;
use Illuminate\Auth\Events\Registered;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
       return view("admin.register"); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'class' => ['numeric' , 'required' ,Rule::in([10,11,12])] ,
            'user_name' => ['required', 'string', 'max:255' , 'unique:'.User::class ],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'img_url' =>[' image' ,'mimes:jpeg,png']
        ]);

        if ($request->hasFile('img_url')) {
            $filepath = Storage::disk('public')->put('/profile' , $request->file("img_url"));
           
        }
        $user = User::create([

            'first_name' => $request->first_name ,
            'last_name' => $request->last_name  ,
            "user_name" => $request->user_name ,
            "email" => $request->email ,
            "classes_id" => $request->class ,
            "password" => Hash::make($request->password ),
            'img_url' => $filepath ?? null


        ]) ;
            
          event(new Registered($user));
            DB::table("allowed_devices")->insert([
                'user_id' => $user->id ,
                'device'  => $request->userAgent() ,
                'location' => Location::get($request->ip)->countryName 
            ]);

        
        Auth::login($user);
        return redirect('/');  

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
