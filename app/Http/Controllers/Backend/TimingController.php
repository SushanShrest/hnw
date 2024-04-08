<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Timing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimingController extends Controller
{
    protected $baseRoute = 'timings.index';
    protected $viewPath = 'backend.timings';
    protected $timing;

    public function __construct(Timing $timing)
    {
        $this->timing = $timing;
    }

    public function index()
    {
        $doctorId = Auth::user()->doctor->id;
        $timings = $this->timing->where('doctor_id', $doctorId)->get();
        return view($this->viewPath . '.index', compact('timings'));
    }

    public function store(Request $request)
    {
        $doctorId = Auth::user()->doctor->id;

        // Validate request data
        $validatedData = $request->validate([
            'day' => 'required',
            'shift' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required',
            'visit_fee' => 'required|integer',
        ]);

        // Check if a shift already exists for the selected day
        $existingShifts = $this->timing->where('doctor_id', $doctorId)
            ->where('day', $validatedData['day'])
            ->pluck('shift')
            ->toArray();

        // If no shifts exist for the selected day, allow the creation
        if (empty($existingShifts)) {
            $validatedData['doctor_id'] = $doctorId;
            $this->timing->create($validatedData);
            return redirect()->route($this->baseRoute)->with('success', 'Timing added successfully.');
        }

        // If a shift already exists for the selected day, check if the current shift is different
        if (!in_array($validatedData['shift'], $existingShifts)) {
            $validatedData['doctor_id'] = $doctorId;
            $this->timing->create($validatedData);
            return redirect()->route($this->baseRoute)->with('success', 'Timing added successfully.');
        }

        // If the current shift already exists for the selected day, show an error message
        return redirect()->back()->with('error', 'A timing for this shift already exists for the selected day.');
    }

    public function edit($id)
    {
        $timing = $this->timing->findOrFail($id);
        return view($this->viewPath . '.edit', compact('timing'));
    }

    public function update(Request $request, $id)
    {
        $timing = $this->timing->findOrFail($id);

        $validatedData = $request->validate([
            'day' => 'required',
            'shift' => [
                'required',
                function ($attribute, $value, $fail) use ($timing) {
                    // Check if the current shift exists for the same day and doctor
                    $existingShift = $this->timing->where('doctor_id', $timing->doctor_id)
                        ->where('day', $timing->day)
                        ->where('shift', $value)
                        ->exists();

                    // If the current shift already exists, fail validation
                    if ($existingShift) {
                        $fail("A timing for shift $value already exists for the selected day. Press timing to return back.");
                    }
                },
            ],
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required',
            'visit_fee' => 'required|integer',
        ]);

        $timing->update($validatedData);

        return redirect()->route($this->baseRoute)->with('success', 'Timing updated successfully.');
    }

    public function destroy(Timing $timing)
    {
        $timing->delete();
        return redirect()->route($this->baseRoute)->with('success', 'Timing deleted successfully.');
    }

    public function adminindex(Request $request)
    {
        $query = $this->timing->query();

        if ($request->has('timingSearch')) {
            $searchTerm = $request->timingSearch;

            // Perform search
            $this->searchTimings($query, $searchTerm);
        }

        // Get the filtered timings
        $timings = $query->get();

        // Return the view with filtered timings
        return view($this->viewPath . '.adminindex', compact('timings'));
    }

    private function searchTimings($query, $searchTerm)
    {
        // Search by doctor's ID
        $query->whereHas('doctor', function ($query) use ($searchTerm) {
            $query->where('id', $searchTerm);
        });

        // Search by doctor's name
        $query->orWhereHas('doctor.user', function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        });
    }
}
