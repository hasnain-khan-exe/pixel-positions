<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->all());
         $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
            'user_type' => ['required', 'in:employee,employer'],
            'avatar' => ['required', File::types(['png', 'jpg', 'webp'])],
        ]);

        // $employerAttributes = $request->validate([
        //     'employer' => ['required'],
        //     'logo' => ['required', File::types(['png', 'jpg', 'webp'])],
        // ]);

        $logoPath = $request->avatar->store('logos');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'user_type'=>$request->user_type,
            'avatar'=> $logoPath
        ]);

        if ($userAttributes['user_type'] === 'employer') {
        $employerAttributes = $request->validate([
            'employer' => ['required'],
        ]);



        $user->employer()->create([
            'name' => $employerAttributes['employer'],
        ]);
    }

        Auth::login($user);

        if($user->user_type=='employer'){
            return redirect('/dashboard');
        }

        if($user->user_type=='employee'){
            return redirect('/');
        }


        return redirect('/');
    }

}
