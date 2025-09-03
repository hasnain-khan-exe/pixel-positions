<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $query = trim(strtolower(request()->query('q')));
        $jobs = Job::query()
            ->with(['employer', 'tags'])
            ->whereRaw('LOWER(title) LIKE ?', ["%$query%"])
            ->paginate(10);

        return view('results', ['jobs' => $jobs]);
    }
}