<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();
        return view('backend.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        $departments = Department::all();
        return view('backend.profile.edit', compact('user', 'departments'));
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'gender' => 'nullable|string|in:Male,Female,Other',
            'dob' => 'nullable|date',
            'contact' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'qualification' => 'nullable|string|max:255',
            'experience' => 'nullable|integer|min:0',
            'specialization' => 'nullable|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'education' => 'nullable|string|max:255',
            'work_places' => 'nullable|string|max:255',
        ]);

        // Handle file upload if an image is provided in the request
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/profile'), $imageName);
            $user->image = $imageName;
        }

        // Update user profile fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->contact = $request->contact;
        $user->location = $request->location;

        // Save the updated user profile
        $user->save();

        // If the user is a doctor, update or create doctor profile
        if ($user->type === 'doctor') {
            $doctor = Doctor::where('user_id', $user->id)->firstOrNew();
            $doctor->qualification = $request->qualification;
            $doctor->experience = $request->experience;
            $doctor->specialization = $request->specialization;
            $doctor->department_id = $request->department_id;
            $doctor->education = $request->education;
            $doctor->work_places = $request->work_places; 
            $doctor->save();
        }

        // Redirect to the profile page with a success message
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}
