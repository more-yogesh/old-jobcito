<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeReviewRequest;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(StoreEmployeeReviewRequest $request)
    {
        Review::firstOrCreate([
            'employee_title' => $request->title,
            'employee_message' => $request->message,
            'employee_rating' => $request->rating,
            'employer_profiles_id' => (int)$request->employer_profile,
            'employee_profiles_id' => auth()->user()->employee->id,
        ]);
        return response()->json(['status', 'Review Added Successfully !'], 200);
    }
}
