<?php

namespace App\Http\Controllers;

use App\EmployerProfile;
use App\Job;
use App\Review;
use App\User;
use Cmgmyr\Messenger\Models\Thread;
use Notification;
use App\Notifications\JobAppliedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = auth()->user()->getRoleNames()->first();
        if ($role == 'employer') {
            $profile = EmployerProfile::where('user_id', auth()->id())->get();
        } else {
            return redirect()->route('dashboard');
        }

        $notifications = auth()->user()->notifications()->paginate(5);
        $postedJobsCount = Job::where('user_id', '=', auth()->id())->count();
        $trashedPostedJobsCount = Job::where('user_id', '=', auth()->id())->onlyTrashed()->count();
        $reviewCount = Review::where('employer_profiles_id', auth()->id())->count();

        return view('home', compact('profile', 'postedJobsCount', 'reviewCount', 'trashedPostedJobsCount', 'notifications'));
    }
}
