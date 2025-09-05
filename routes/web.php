<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/', [JobController::class, 'index']);
Route::get('/jobs', [JobController::class, 'allJobsView']);
Route::get('dashboard', function () {
    if (auth()->user()->user_type !== 'employer') {
        return back()->with('error', 'You are not an employer!');
    }

    $jobs = \App\Models\Job::with(['employer', 'tags','employees'])->whereHas('employer', function ($e) {
        $e->whereHas('user', function ($u) {
            $u->where('id', auth()->user()->id);
        });
    })->paginate(6);


    // dd($jobs->toArray());
    return view('jobs.dashboard', [
        'jobs' => $jobs,
        'tags' => \App\Models\Tag::all(),
    ]);
})->name('dashboard');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');


Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');




