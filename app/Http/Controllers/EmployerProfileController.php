<?php

namespace App\Http\Controllers;

use App\EmployerProfile;
use App\Http\Requests\UpdateEmployerProfile;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class EmployerProfileController extends Controller
{
    public function index()
    {
        $profile = EmployerProfile::where('user_id', auth()->user()->id)->first();
        return view('employer-profile.edit', compact('profile'));
    }

    public function changeStatus(Request $request)
    {
        EmployerProfile::where('user_id', auth()->user()->id)->update([
            'jobs_open' => $request->status
        ]);
        return response()->json(['success'=> 'Status Changed Successfully'], 200);
    }

    public function store(UpdateEmployerProfile $request)
    {
        $employer = EmployerProfile::where('user_id', '=', auth()->id())->update($request->validated());
        if ($request->hasFile('logo')) {
            $logo = EmployerProfile::where('user_id', '=', auth()->id())->first();
            Media::where('model_id', $logo->id)->forceDelete();
            $logo->addMediaFromRequest('logo')->toMediaCollection('logos');
        }
        return redirect()->back()->with('success', 'Profile Updated Successfully !');
    }
}
