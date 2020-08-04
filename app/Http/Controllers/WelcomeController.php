<?php

namespace App\Http\Controllers;

use App\AppliedJob;
use App\Category;
use App\City;
use App\EmployerProfile;
use App\Job;
use App\JobType;
use App\Notifications\JobAppliedNotification;
use App\Review;
use App\Tag;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
                'tags' => Tag::all(),
                'recentJobs' => Job::latest()->take(10)->get(),
                'slugs' => Page::all()
            ]
        );
    }

    public function search(Request $request, Job $job)
    {
        // job filters
        $jobs = $job->newQuery();
        if ($request->has('title')) {
            $jobs->where('title', 'like', '%' . $request->title . '%');
            $jobs->OrWhere('description', 'like', '%' . $request->title . '%');
        }
        // zipcode search
        if ($request->has('zipcode')) {
            $jobs->whereHas('employer.employerProfile', function ($query) use ($request) {
                $query->where('zipcode', '=', $request->zipcode);
            });
        }

        //  search by city
        if ($request->has('city_id')) {
            $jobs->whereHas('employer.employerProfile', function ($query) use ($request) {
                $query->where('city_id', '=', $request->city_id);
            });
        }

        // search by categorySearch Results
        if ($request->has('category')) {
            $jobs->whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', '=', $request->category);
            });
        }

        // search by job types
        if ($request->has('type')) {
            $jobs->whereHas('jobType', function ($query) use ($request) {
                $query->whereIn('id', $request->type);
            });
        }

        // search by salary range

        if ($request->has('salary_range')) {
            $range = explode(",", str_replace(' ', '', $request->salary_range));
            $jobs->whereBetween('salary_upto', [$range[0], $range[1]]);
        }

        $jobs = $jobs->paginate(10)->appends($request->query());

        // job categories
        $categories = Category::all();
        $jobType = JobType::all();
        $city = City::find($request->city_id);
        return view('search', compact('jobs', 'categories', 'jobType', 'city'));
    }

    public function showJob($id, $slug)
    {
        $job = Job::findOrFail($id);
        $jobsTags = $job->tags()->get();
        $isApplied = false;

        $count = AppliedJob::where([
            'employee_id' => auth()->id(),
            'job_id' => $id
        ])->count();
        if ($count > 0) {
            $isApplied = true;
        }

        $relatedTags = [];
        foreach ($jobsTags as $key => $tag) {
            $relatedTags[$key] = $tag->name;
        }
        $similarJobs = Job::withAnyTags($relatedTags)->where('id', '!=', $id)->get()->take(2);

        return view('show-job', [
            'job' => $job,
            'similarJobs' => $similarJobs,
            'tags' => implode(",", $relatedTags),
            'isApplied' => $isApplied
        ]);
    }

    public function showCompany($id, $slug)
    {
        $company = EmployerProfile::findOrFail($id);
        $reviewAdded = false;

        $find = Review::where('employer_profiles_id', $id)
            ->where('employee_profiles_id', auth()->user()->employee->id ?? null)
            ->get();

        $openPositions = Job::where('user_id', $company->user_id)->latest()->paginate(4);

        if ($find->count() > 0) {
            $reviewAdded = true;
        }

        $approvedReviews = Review::with('employeeProfile')
            ->where('employer_profiles_id', '=', $id)
            ->where('employer_rating', '<>', null)
            ->get();
        return view('show-company', [
            'company' => $company,
            'openPositions' => $openPositions,
            'reviews' => Review::where('employer_profiles_id', '=', $id)->get(),
            'approvedReviews' => $approvedReviews,
            'reviewAdded' => $reviewAdded,
        ]);
    }
}
