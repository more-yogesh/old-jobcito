<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\EmployeeProfile;
use App\Http\Requests\UpdateEmployeeProfileRequest;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class EmployeeProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $profile = EmployeeProfile::where('user_id', auth()->id())->first();
        return view('employee.profile.edit', compact('profile'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateEmployeeProfileRequest $request)
    {
        $employee = EmployeeProfile::where('user_id', '=', auth()->id())->update($request->validated());
        if ($request->hasFile('profile')) {
            $profile = EmployeeProfile::where('user_id', '=', auth()->id())->first();
            Media::where('model_id', $profile->id)->forceDelete();
            $profile->addMediaFromRequest('profile')->toMediaCollection('profiles');
        }
        return redirect()->back()->with('success', 'Profile Updated Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeProfile $employeeProfile)
    {
        //
    }
    public function changeStatus(Request $request)
    {
        EmployeeProfile::where('user_id', auth()->id())->update([
            'looking_job' => $request->status
        ]);
        return response()->json(['success'=> 'Job Status Changed Successfully'], 200);
    }
}
