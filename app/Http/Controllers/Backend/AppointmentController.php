<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Timing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
// ADMIN SECTION

    public function index(Request $request)
    {
        $status = $request->input('status');
        $searchUser = $request->input('search_user');
        $searchDoctor = $request->input('search_doctor');

        // Filter appointments by status if status is provided
        $query = Appointment::with('user')->orderBy('date', 'asc');

        if ($status) {
            $query->where('status', $status);
        }

        // Filter appointments by user name if search_user is provided
        if ($searchUser) {
            $query->whereHas('user', function ($query) use ($searchUser) {
                $query->where('name', 'like', "%$searchUser%");
            });
        }

        // Filter appointments by doctor name if search_doctor is provided
        if ($searchDoctor) {
            $query->whereHas('timing.doctor.user', function ($query) use ($searchDoctor) {
                $query->where('name', 'like', "%$searchDoctor%");
            });
        }

        $appointments = $query->paginate(10);

        return view('backend.appointments.index', compact('appointments', 'status', 'searchUser', 'searchDoctor'));
    }

    public function show(Appointment $appointment)
    {
        return view('backend.appointments.show', compact('appointment'));
    }


//USER SECTION
public function userIndex(Request $request)
{
    $user = Auth::user();
    $status = $request->input('status');
    $searchDoctor = $request->input('doctor');

    $userAppointments = $user->appointments();

    if (!empty($status)) {
        $userAppointments->where('status', $status);
    }

    if (!empty($searchDoctor)) {
        $userAppointments->whereHas('timing.doctor.user', function ($query) use ($searchDoctor) {
            $query->where('name', 'like', '%' . $searchDoctor . '%');
        });
    }

    $userAppointments = $userAppointments->orderBy('date', 'asc')->paginate(10);

    return view('backend.appointments.userindex', compact('userAppointments', 'user', 'status', 'searchDoctor'));
}


    public function create(Doctor $doctor)
    {
        return view('backend.appointments.create', compact('doctor'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'timing_id' => 'required|exists:timings,id',
            'date' => 'required|date',
            'location' => 'required|string',
            'problem' => 'required|string',
            'problem_description' => 'required|string',
            'patient_description' => 'required|string',
        ]);

        // Check if the selected date corresponds to the available timings for the selected day
        $timing = Timing::findOrFail($validatedData['timing_id']);
        $selectedDate = new Carbon($validatedData['date']);
        $selectedDay = strtolower($selectedDate->format('l')); // Get the lowercase day name

        if (strtolower($timing->day) !== $selectedDay) {
            // If the selected day does not match the timing's day, throw an error
            return redirect()->back()->withErrors(['date' => '! The selected date day and the chosen timings day does not match.'])->withInput();
        }

        Appointment::create($validatedData);

        return redirect()->route('appointments.userindex')->with('success', 'Appointment created successfully!');
    }

    public function usershow(User $user, Appointment $appointment)
    {
        $user = Auth::user();

        // Ensure the appointment belongs to the authenticated user
        if ($appointment->user_id !== $user->id) {
            return redirect()->route('appointments.userindex')->with('error', 'Unauthorized access');
        }

        $appointment->load('timing.doctor.user');

        return view('backend.appointments.usershow', compact('appointment', 'user'));
    }

//DOCTOR SECTION
    public function doctorIndex(Request $request)
    {
        $doctor = Auth::user()->doctor;
        $status = $request->input('status');
        $searchUser = $request->input('user');

        $doctorAppointments = $doctor->appointments();

        if (!empty($status)) {
            $doctorAppointments->where('status', $status);
        }

        if (!empty($searchUser)) {
            $doctorAppointments->whereHas('user', function ($query) use ($searchUser) {
                $query->where('name', 'like', '%' . $searchUser . '%');
            });
        }

        $doctorAppointments = $doctorAppointments->orderBy('date', 'asc')->paginate(10);

        return view('backend.appointments.doctorindex', compact('doctorAppointments', 'doctor', 'searchUser'));
    }



    public function doctorshow(Doctor $doctor, Appointment $appointment)
    {
        $authenticatedDoctor = Auth::user()->doctor;

        // Ensure the appointment belongs to the authenticated doctor
        if ($appointment->timing->doctor_id !== $authenticatedDoctor->id) {
            return redirect()->route('appointments.doctorindex')->with('error', 'Unauthorized access');
        }

        $appointment->load('user', 'timing');

        return view('backend.appointments.doctorshow', compact('appointment', 'authenticatedDoctor'));
    }

    public function accept(Appointment $appointment)
    {
        $appointment->update(['status' => 'accepted']);

        return redirect()->back()->with('success', 'Appointment accepted successfully!');
    }

    public function reject(Appointment $appointment)
    {
        $appointment->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Appointment rejected successfully!');
    }

    public function complete(Appointment $appointment)
    {
        $appointment->update(['status' => 'completed']);

        return redirect()->back()->with('success', 'Appointment completed successfully!');
    }


// USER-DOCTOR SECTION

    public function cancel(Appointment $appointment)
    {
        $appointment->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Appointment cancelled successfully!');
    }
}
