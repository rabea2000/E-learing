<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit' , 
        ['user' => Auth::user()]);
    }
    
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'img_url' =>[' image' ,'mimes:jpeg,png']
        ]) ; 
        

       
        if($request->has('action')) {

            
           //  the image will be detete if the action was upload  
           //  to store anthor image or detete to delet the current image
            if(isset(Auth::user()->img_url)){
            Storage::disk('public')->delete(Auth::user()->img_url);
            }

            if ($request->action == 'delete'){
                $request->user()->img_url = null ;
               }
            

           if ($request->action == 'upload'){
         
                $filepath = Storage::disk('public')->put('/profile' , $request->file("profilePic"));
                $request->user()->img_url = $filepath ;
            
           }

           $request->user()->save() ;
           return Redirect::back() ; 
        }



        $data=  $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            // 'class' => ['numeric' , 'required' ,Rule::in([10,11,12])] ,
            // 'user_name' => ['required', 'string', 'max:255' , 'unique:'.User::class ],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
        ]);
        $request->user()->fill($data);

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        $request->user()->save();
       

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


 
}
