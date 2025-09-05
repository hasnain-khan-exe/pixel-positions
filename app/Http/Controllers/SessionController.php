<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.',
            ]);
        }

        request()->session()->regenerate();
        if(request()->user()->user_type === 'employer'){
            return redirect()->route('dashboard')->with('success', 'Welcome');
        }

        if(request()->user()->user_type === 'employee'){
            return redirect('/')->with('success', 'Welcome '. Auth::user()->name);
        }

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}


