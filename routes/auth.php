<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\RegistrationController;

Route::middleware("auth")->group(function () {

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');


    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/');
    })->middleware('signed')->name('verification.verify');


    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');

    Route::get('/logout', [SessionController::class, 'destroy'])->name('logout');
    Route::put('password', [SessionController::class, 'update'])->name('password.update')->middleware('twofactor');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('twofactor');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('twofactor');
    // Route::patch('/profile', function(Request $request){
    //     dd($request) ;
    // })->name('picture.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegistrationController::class, 'create']);
    Route::post('/register', [RegistrationController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');


    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});
