<?php

namespace App\Http\Middleware;

use App\Models\PaidUsers;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class IsPaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     
        $user = Auth::user() ; 
        if (Auth::check()) {

            if(!PaidUsers::where("user_id","=",$user->id)->exists() || !$user->is_admin )     {

                return view("to-paid") ; 
            } 

        }

        
        return $next($request);
    }
}
