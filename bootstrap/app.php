<?php


use App\Http\Middleware\IsAdminMiddleware;

use App\Http\Middleware\LastSeen;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware->group('web', [
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
           
        ]);
       $middleware->alias([

            'admin' =>IsAdminMiddleware::class ,
            'twofactor' => \App\Http\Middleware\TwoFactorMiddleware::class,
            'is_paid' => \App\Http\Middleware\IsPaid::class ,
       ]) ; 
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
