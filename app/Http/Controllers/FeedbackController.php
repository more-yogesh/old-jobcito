<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\FeedbackStoreRequest;
use Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(FeedbackStoreRequest $request)
    {
        if (empty(auth::user()->id)) {
            Feedback::create($request->validated());
        } else {
            Feedback::create($request->validated() + ['user_id' => auth()->user()->id]);
        }
        return response()->json(['success' => 'Thanks To Give Your Valuable Feedback!'], 200);
    }

    public function show(Feedback $feedback)
    {
        //
    }

    public function edit(Feedback $feedback)
    {
        //
    }

    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    public function destroy(Feedback $feedback)
    {
        //
    }
}
