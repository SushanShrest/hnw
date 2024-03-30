<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DoctorController extends Controller
{
    protected $doctor;
    protected $department;
    protected $baseRoute = 'doctors.index';
    protected $viewPath = 'backend.doctors';

    public function __construct(Doctor $doctor, Department $department)
    {
        $this->doctor = $doctor;
        $this->department = $department;
    }

    public function index()
    {
        $doctors = $this->doctor->get();
        $departments = $this->department->all(); // Correct variable name

        return view($this->viewPath . '.index', compact('doctors', 'departments')); // Pass departments to the view
    }

    public function create()
    {
        $departments = $this->department->all();
        return view($this->viewPath . '.create', compact('departments'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'department_id' => 'required|exists:departments,id',
            'status' => 'required',
            'gender' => 'required',
            'experience' => 'required|integer',
            'qualification' => 'required',
        ]);
    
        try {
            // Create a new user
            $user = \App\Models\User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
    
            // Create a new doctor associated with the user
            $doctor = $this->doctor->create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'department_id' => $validatedData['department_id'],
                'status' => $validatedData['status'],
                'gender' => $validatedData['gender'],
                'experience' => $validatedData['experience'],
                'qualification' => $validatedData['qualification'],
            ]);
    
            // Optionally, you can assign the role here if needed
            $user->assignRole('doctor');
    
            return redirect()->route($this->baseRoute)->with('success', 'Doctor created successfully.');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->with('error', 'Failed to create doctor.');
        }
    }

    public function edit($id)
{
    $doctor = $this->doctor->findOrFail($id);
    $departments = $this->department->all();
    return view($this->viewPath . '.edit', compact('doctor', 'departments'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:6',
        'department_id' => 'required|exists:departments,id',
        'status' => 'required',
        'gender' => 'required',
        'experience' => 'required|integer',
        'qualification' => 'required',
    ]);

    try {
        $doctor = $this->doctor->findOrFail($id);
        $email = $doctor->email;

        $doctor->update($validatedData);

        // Find the user with the same email as the doctor
        $user = \App\Models\User::where('email', $email)->first();

        if ($user) {
            // Update user's name and email
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ]);

            // Update user's password if provided
            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($request->input('password')),
                ]);
            }
        }

        return redirect()->route($this->baseRoute)->with('success', 'Doctor updated successfully.');
    } catch (ModelNotFoundException $e) {
        return back()->with('error', 'Doctor not found.');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return back()->withInput()->with('error', 'Failed to update doctor.');
    }
}

public function destroy($id)
{
    try {
        $doctor = $this->doctor->findOrFail($id);
        $email = $doctor->email;

        // Find the user with the same email as the doctor
        $user = \App\Models\User::where('email', $email)->first();

        if ($user) {
            DB::transaction(function () use ($doctor, $user) {
                $user->delete(); // Delete associated user record
                $doctor->delete(); // Delete doctor record
            });
        } else {
            $doctor->delete(); // Delete doctor record
        }

        return redirect()->route($this->baseRoute)->with('success', 'Doctor deleted successfully.');
    } catch (ModelNotFoundException $e) {
        return back()->with('error', 'Doctor not found.');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return back()->withInput()->with('error', 'Failed to delete doctor.');
    }
}

}
