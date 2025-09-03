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

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}


// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Validation\ValidationException;

// class SessionController extends Controller
// {
//     // Show login form
//     public function create(Request $request)
//     {
//         // optional: role/type from query string
//         $role = $request->query('type', 'employee'); 
//         return view('auth.login', compact('role'));
//     }

//     // Handle login form submission
//     public function store(Request $request)
//     {
//         $attributes = $request->validate([
//             'email' => ['required', 'email'],
//             'password' => ['required'],
//         ]);

//         if (! Auth::attempt($attributes)) {
//             throw ValidationException::withMessages([
//                 'email' => 'Sorry, those credentials do not match.',
//             ]);
//         }

//         // regenerate session
//         $request->session()->regenerate();

//         // Redirect based on user type
//         $user = Auth::user();

//         if ($user->user_type === 'employer') {
//             return redirect('/jobs'); // employer dashboard
//         }

//         if ($user->user_type === 'employee') {
//             return redirect('/'); // employee index page
//         }

//         // fallback
//         return redirect('/');
//     }

//     // Handle logout
//     public function destroy(Request $request)
//     {
//         Auth::logout();

//         $request->session()->invalidate();
//         $request->session()->regenerateToken();

//         return redirect('/');
//     }
// }