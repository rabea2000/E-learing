<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class LastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     
        
        if (Auth::check()) {

            $online_users = Cache::has('online_users') ? Cache::get('online_users')  :[] ; 
            if (key_exists(Auth::user()->id ,$online_users )){

                $online_users[Auth::user()->id ] = now() ;
            }
                else{

                    $online_users[] = [Auth::user()->id  => now()] ;
                }
            Cache::put("onine_users" , true , 40) ; 

        }

        
        return $next($request);
    }
}
