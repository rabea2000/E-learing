<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        
        $user = Auth::user();

        
    if (Auth::check() && $user->two_factor_code) {
            if ($user->two_factor_expires_at < now()) {
                $user->resetTwoFactorCode();
                Auth::logout() ; 
                return redirect()->route('login')
                    ->withStatus('Your verification code expired. Please re-login.');
            }
            if (!$request->is('verify*')) {

      
                return redirect()->route('verify.index');
            }
        }
        return $next($request);
    }
}
