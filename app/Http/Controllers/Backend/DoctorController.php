<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;

class DoctorController extends Controller
{
    protected $baseRoute = 'doctors.index';
    protected $viewPath = 'backend.doctors';
    
    /**
     * Display a listing of the doctors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('doctorsearch');
        $doctors = Doctor::query();

        if ($searchTerm) {
            $doctors = $this->searchDoctors($doctors, $searchTerm);
        }

        $doctors = $doctors->get();

        return view($this->viewPath . '.index', compact('doctors', 'searchTerm'));
    }


    /**
     * Show the form for editing the specified doctor.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
    $departments = Department::all();
    $user = $doctor->user;
    return view($this->viewPath . '.edit', compact('doctor', 'user', 'departments'));
    }
    /**
     * Update the specified doctor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {      
        $request->validate([
            'qualification' => 'nullable|string',
            'experience' => 'nullable|numeric',
            'specialization' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'education' => 'nullable|string',
            'work_places' => 'nullable|string',
        ]);
       
        $doctor->update($request->all());

        return redirect()->route($this->baseRoute)->with('success', 'Doctor updated successfully.');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        $user = $doctor->user; 
        $departments = Department::all();

        return view($this->viewPath . '.show', compact('user', 'doctor', 'departments'));
    }

    private function searchDoctors($query, $searchTerm)
    {
        return $query->whereHas('user', function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('contact', 'like', '%' . $searchTerm . '%');
        })->orWhereHas('department', function ($query) use ($searchTerm) {
            $query->where('department_name', 'like', '%' . $searchTerm . '%');
        });
    }


    /**
     * Remove the specified doctor from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Doctor $doctor)
    // {
    //     $doctor->delete();
    //     return redirect()->route($this->baseRoute)->with('success', 'Doctor deleted successfully.');
    // }
}
