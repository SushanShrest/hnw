<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Becomedoctor;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BecomedoctorController extends Controller
{
    protected $becomedoctor;
    protected $baseRoute = 'becomedoctors.index';
    protected $viewPath = 'backend.becomedoctors';

    public function __construct(Becomedoctor $becomedoctor)
    {
        $this->becomedoctor = $becomedoctor;
    }

    public function index()
    {
        $becomedoctors = $this->becomedoctor->get();
        return view($this->viewPath . '.index', compact('becomedoctors'));
    }

    public function create()
    {
        return view($this->viewPath . '.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'medical_license' => 'required|string',
            'file' => 'required|string',
            'status' => 'required|string'
        ]);

        try {
            $becomedoctor = $this->becomedoctor->create($validatedData);
            return redirect()->route($this->baseRoute)->with('success', 'Becomedoctor created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->with('error', 'Failed to create becomedoctor.');
        }
    }

    public function edit($id)
    {
        $becomedoctor = $this->becomedoctor->findOrFail($id);
        return view($this->viewPath . '.edit', compact('becomedoctor'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'medical_license' => 'required|string',
            'file' => 'required|string',
            'status' => 'required|string'
        ]);

        try {
            $becomedoctor = $this->becomedoctor->findOrFail($id);
            $becomedoctor->update($validatedData);
            return redirect()->route($this->baseRoute)->with('success', 'Becomedoctor updated successfully.');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Becomedoctor not found.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->with('error', 'Failed to update becomedoctor.');
        }
    }

    public function destroy($id)
    {
        try {
            $becomedoctor = $this->becomedoctor->findOrFail($id);
            $becomedoctor->delete();
            return redirect()->route($this->baseRoute)->with('success', 'Becomedoctor deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Becomedoctor not found.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Failed to delete becomedoctor.');
        }
    }
}
