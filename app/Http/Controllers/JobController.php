<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredJobs = Job::latest()
        ->with(['employer', 'tags'])
        ->where('expired_at','>', now())
        ->where('featured', true)
        ->get();
        
        return view('jobs.index', [
            'featuredJobs' => $featuredJobs,
            'tags' => Tag::all()
        ]);
    }
    public function allJobsView()
    {
        $jobs = Job::with(['employer', 'tags'])->where('expired_at','>', now())->paginate(6);
        return view('jobs.all-jobs', [
            'jobs' => $jobs,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in stor*/
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'schedule' => 'required| ' . Rule::in(['Full Time', 'Part Time']),
            'url' => 'required|active_url',
            'tags' => 'nullable',
            'expired_at' => 'required|date|after:today',
        ]);

        $attributes['featured'] = $request->has('featured');
        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Job Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
