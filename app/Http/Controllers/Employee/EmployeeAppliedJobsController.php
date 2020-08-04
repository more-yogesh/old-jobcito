<?php

namespace App\Http\Controllers\Employee;

use App\AppliedJob;
use App\Http\Controllers\Controller;
use App\Notifications\JobAppliedNotification;
use App\User;
use App\Job;
use Illuminate\Http\Request;

class EmployeeAppliedJobsController extends Controller
{
    public function apply($jobId)
    {
        AppliedJob::firstOrCreate([
            'employee_id' => auth()->id(),
            'job_id' => $jobId
        ]);

        $job = Job::find($jobId);

        $details = [
            'greeting' => "Hello " . $job->employer->employerProfile->name,
            'body' => auth()->user()->employee->name . " Applied for your job named " . $job->title . " click to check your job status",
            'thanks' => 'Thank you for using JobCito, No1 Job Finding Network',
            'actionText' => 'View Candidate Details',
            'actionURL' => route('candidates', $jobId),
            'notificationLink' =>
                [
                    'link' => route('candidates', $jobId),
                    'text' => "<strong>" . auth()->user()->employee->name . "</strong> applied for a job <span class='color'>" . $job->title . "</span>"
                ]
        ];

        $job->employer->notify(new JobAppliedNotification($details));
        return redirect()->back()->with('success', 'Applied To Job Successfully !');
    }
}
