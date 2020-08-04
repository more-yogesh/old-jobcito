<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Job;
use App\JobType;
use Spatie\MediaLibrary\Models\Media;

class JobController extends Controller
{
    public function index()
    {

        if (\request('trash') == 'true') {
            $jobs = Job::with('appliedJobs')->where('user_id', auth()->user()->id)->onlyTrashed()->paginate(10);
        } else {
            $jobs = Job::with('appliedJobs')->where('user_id', auth()->user()->id)->paginate(10);
        }
        return view('job.index', compact('jobs'));
    }

    public function create()
    {
        $categories = app('rinvex.categories.category')->get();
        $jobTypes = JobType::all();
        return view('job.create', compact('categories', 'jobTypes'));
    }

    public function store(CreateJobRequest $request)
    {
        $job = new Job;
        $job->title = $request->title;
        $job->user_id = auth()->user()->id;
        $job->type = $request->type;
        $job->salary_upto = $request->salary_upto;
        $job->description = $request->description;
        $job->city_id = auth()->user()->employerProfile->city_id;
        $job->save();
        $job->attachCategories((int)$request->category);
        if ($request->hasFile('image')) {
            $job->addMediaFromRequest('image')->toMediaCollection('job_post_images');
        }
        $tags = explode(",", $request->tags);
        $job->attachTags($tags);
        return redirect()->back()->with('success', 'Job Posted Successfully.');
    }

    public function show($id)
    {
        $job = Job::withTrashed()->findOrFail($id);
        $job->restore();
        return redirect()->back()->with('success', 'job restored successfully!');
    }

    public function edit(Job $job)
    {
        if ($job->user_id != auth()->user()->id) {
            return abort(404);
        }
        $categories = app('rinvex.categories.category')->get();
        $jobTypes = JobType::all();
        return view('job.edit', compact('job', 'categories', 'jobTypes'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        if ($job->user_id != auth()->user()->id) {
            return abort(404);
        }
        $job->title = $request->title;
        $job->type = $request->type;
        $job->salary_upto = $request->salary_upto;
        $job->description = $request->description;
        $job->city_id = auth()->user()->employerProfile->city_id;
        $job->save();
        $job->syncCategories((int)$request->category);
        if ($request->hasFile('image')) {
            Media::where('model_id', $job->id)->forceDelete();
            $job->addMediaFromRequest('image')->toMediaCollection('job_post_images');
        }
        $tags = explode(",", $request->tags);
        $job->syncTags($tags);
        return redirect()->route('jobs.index')->with('success', 'Job Post Updated Successfully.');
    }

    public function destroy(Job $job)
    {
        if ($job->user_id != auth()->user()->id) {
            return abort(404);
        }
        $job->delete();
        return redirect()->back()->with('success', 'job move to the trash successfully!');
    }
}
