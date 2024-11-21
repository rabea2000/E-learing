<?php

namespace App\Http\Controllers\Auth;

use App\file\Visitor;
use App\Http\Requests\LoginRequest;
use Carbon\Carbon ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Notifications\SendTwoFactorCode;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Stevebauman\Location\Facades\Location;

class SessionController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("session.login");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {

        
        $request->authenticate() ; 
        $request->session()->regenerate();


        if(!Visitor::isDeviecAllowed()) {
           
            $request->user()->generateTwoFactorCode();
            $request->user()->notify(new SendTwoFactorCode());
            return redirect()->route('verify.index'); 
        }

        // if(!Visitor::isDeviecAllowed() && !Auth::user()->is_admin){
         
        //     DB::table('access_denied')->insert([
        //         'user_id' =>  Auth::user()->id ,
        //         'device'  => $request->userAgent() ,
        //         'location' => Location::get($request->ip()) ,
        //         "created_at" => date('Y-m-d H:i:s') 
        //     ]);
            
        //     Auth::logout() ; 
        //     return view("session.accessdenied" );
            
        // }

        // Visitor::blockeOtherSession() ; 
        

        
        return redirect('/');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password' ],
            'password' => ['required',  'confirmed']//Password::defaults()
        ]);
        

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

     
        return back()->with('status', 'password-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request) 
    {
        Auth::logout() ; 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/"); 
    }
}
