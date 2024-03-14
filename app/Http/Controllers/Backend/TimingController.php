<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Timing;
use Illuminate\Http\Request; // Add this line
use Illuminate\Support\Facades\Log;


class TimingController extends Controller
{
    protected $timing;
    protected $doctor;
    protected $baseRoute = 'timings.index';
    protected $viewPath = 'backend.timings';

    public function __construct(Timing $timing, Doctor $doctor)
    {
        $this->timing = $timing;
        $this->doctor = $doctor;
    }

    public function index()
    {
        $timings = $this->timing->get();
        $doctors = $this->doctor->all(); // Correct variable name

        return view($this->viewPath . '.index', compact('timings', 'doctors')); // Pass doctors to the view
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $doctors = $this->doctor->all();
    return view($this->viewPath . '.create', compact('doctors'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'day' => 'required',
        'shift' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'avg_consultation_time' => 'required|integer',
    ]);

    $this->timing->create($request->all());

    return redirect()->route($this->baseRoute)->with('success', 'Timing created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $timing = $this->timing->findOrFail($id);
    $doctors = $this->doctor->all();
    return view($this->viewPath . '.edit', compact('timing', 'doctors'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'day' => 'required',
        'shift' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'avg_consultation_time' => 'required|integer|min:1',
    ]);

    $timing = $this->timing->findOrFail($id);
    $timing->update($request->all());

    return redirect()->route($this->baseRoute)->with('success', 'Timing updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timing = $this->timing->findOrFail($id);
        $timing->delete();
        return redirect()->route($this->baseRoute)->with('success', 'Timing deleted successfully.');
    }
    
}
