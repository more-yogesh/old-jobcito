<?php

namespace App\Http\Controllers\Employee;

use App\AppliedJob;
use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $appliedJobs = AppliedJob::where('employee_id', '=', auth()->id())->count();
        $reviewsCount = Review::where('employee_profiles_id', '=', auth()->user()->employee->id)->count();
        $reviews = Review::where('employee_profiles_id', '=', auth()->user()->employee->id)->paginate(10);
        return view('employee.dashboard.index', compact('reviewsCount','appliedJobs', 'reviews'));
    }
}
