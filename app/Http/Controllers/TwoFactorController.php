<?php

namespace App\Http\Controllers;

use App\Notifications\SendTwoFactorCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TwoFactorController extends Controller
{


    public function index()
    {
        return view('auth.twoFactor');
    }
    public function store(Request $request): ValidationException|RedirectResponse
    {

        $request->validate([
            'two_factor_code' => ['integer', 'required'],
        ]);

        $user = auth()->user();
        if ($request->input('two_factor_code') !== $user->two_factor_code) {


            throw ValidationException::withMessages([
                'two_factor_code' => __('The code you entered doesnt match our records'),
            ]);
        }
        $user->resetTwoFactorCode();
        return redirect('/');
    }
    public function resend(): RedirectResponse
    {
        $user = auth()->user();
        $user->generateTwoFactorCode();
        $user->notify(new SendTwoFactorCode());
        return redirect()->back()->withStatus(__('Code has been sent again'));
    }
}