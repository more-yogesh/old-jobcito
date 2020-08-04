<?php

namespace App\Http\Controllers;

use App\AppliedJob;
use App\Job;
use Illuminate\Http\Request;

class ManageCandidateController extends Controller
{
    public function show($jobId)
    {

        $job = Job::findOrFail($jobId);
        if (auth()->id() != $job->user_id){
            abort('403');
        }
        return view('manage-candidates.show', compact('job'));
    }
}
