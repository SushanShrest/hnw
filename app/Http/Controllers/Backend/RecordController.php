<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
        public function userindex(Request $request)
    {
        $user = Auth::user();
        $searchDoctor = $request->input('search_doctor');

        // Retrieve appointments for the authenticated user
        $appointments = $user->appointments()->with('records')->orderBy('date', 'desc');//latest

        // Apply search query for doctor's name if provided
        if ($searchDoctor) {
            $appointments->whereHas('timing.doctor.user', function ($query) use ($searchDoctor) {
                $query->where('name', 'like', "%$searchDoctor%");
            });
        }

        $appointments = $appointments->get();

        // Extract records from appointments
        $records = collect();
        foreach ($appointments as $appointment) {
            $records = $records->merge($appointment->records);
        }

        return view('backend.records.userindex', compact('records', 'searchDoctor'));
    }


    public function doctorindex(Request $request)
    {
        $searchUser = $request->input('search_user');
        
        // Get the authenticated doctor
        $doctor = Auth::user()->doctor;

        $appointments = $doctor->appointments()->with('records')->orderBy('date', 'desc');//latest

        if ($searchUser) {
            $appointments->whereHas('user', function ($query) use ($searchUser) {
                $query->where('name', 'like', "%$searchUser%");
            });
        }

        $appointments = $appointments->get();

        $records = collect();
        foreach ($appointments as $appointment) {
            $records = $records->merge($appointment->records);
        }

        return view('backend.records.doctorindex', compact('records', 'searchUser'));
    }


    public function index(Request $request)
    {
        $searchUser = $request->input('search_user');
        $searchDoctor = $request->input('search_doctor');

        $query = Record::with(['appointment.user', 'appointment.timing.doctor.user'])->orderBy('created_at', 'desc');

        if ($searchUser) {
            $query->whereHas('appointment.user', function ($query) use ($searchUser) {
                $query->where('name', 'like', "%$searchUser%");
            });
        }

        if ($searchDoctor) {
            $query->whereHas('appointment.timing.doctor.user', function ($query) use ($searchDoctor) {
                $query->where('name', 'like', "%$searchDoctor%");
            });
        }

        $records = $query->paginate(10);

        return view('backend.records.index', compact('records', 'searchUser', 'searchDoctor'));
    }

    public function usershow(Record $record)
    {
        $user = Auth::user();

        // Check if the record belongs to the authenticated user
        if ($record->appointment->user_id !== $user->id) {
            return redirect()->route('records.userindex')->with('error', 'Unauthorized access');
        }

        return view('backend.records.usershow', compact('record', 'user'));
    }

    public function doctorshow(Record $record)
    {
        $authenticatedDoctor = Auth::user()->doctor;

        if ($record->appointment->timing->doctor_id !== $authenticatedDoctor->id) {
            return redirect()->route('records.doctorindex')->with('error', 'Unauthorized access');
        }

        return view('backend.records.doctorshow', compact('record', 'authenticatedDoctor'));
    }

    public function show(Record $record)
    {
        return view('backend.records.show', compact('record'));
    }

    public function doctoredit(Record $record)
    {
        $authenticatedDoctor = Auth::user()->doctor;
        if ($record->appointment->timing->doctor_id !== $authenticatedDoctor->id) {
            return redirect()->route('records.doctorindex')->with('error', 'Unauthorized access');
        }

        return view('backend.records.doctoredit', compact('record'));
    }

    public function update(Request $request, Record $record)
    {
        $request->validate([
            'followup_plan' => 'nullable',
            'issue' => 'required',
            'treatment' => 'required',
            'medication' => 'required',
        ]);

        $record->update($request->all());

        return redirect()->route('records.doctorindex')->with('success', 'Record updated successfully');
    }

    public function edit(Record $record)
    {
        // Proceed directly to the edit view for admins
        return view('backend.records.edit', compact('record'));
    }

    public function adminupdate(Request $request, Record $record)
    {
        $request->validate([
            'followup_plan' => 'nullable',
            'issue' => 'required',
            'treatment' => 'required',
            'medication' => 'required',
        ]);

        $record->update($request->all());

        return redirect()->route('records.index')->with('success', 'Record updated successfully');
    }


}
