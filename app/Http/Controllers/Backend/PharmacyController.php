<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;

class PharmacyController extends Controller
{
    protected $baseRoute = 'pharmacies.index';
    protected $viewPath = 'backend.pharmacies';

    /**
     * Display a listing of pharmacies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = Pharmacy::all();
        return view($this->viewPath . '.index', compact('pharmacies'));
    }

    /**
     * Show the form for creating a new pharmacy.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pharmacy = new Pharmacy(); // Create a new instance of the Pharmacy model
        return view($this->viewPath . '.create', compact('pharmacy'));
    }
    

    /**
     * Store a newly created pharmacy in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'district' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'contact' => 'required|string',
        ]);

        // Create the pharmacy
        Pharmacy::create($request->all());

        // Redirect to the index page with success message
        return redirect()->route($this->baseRoute)->with('success', 'Pharmacy created successfully');
    }

    /**
     * Display the specified pharmacy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        $pharmacies = Pharmacy::all();
        return view($this->viewPath . '.display', compact('pharmacies'));
    }


    /**
     * Show the form for editing the specified pharmacy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        return view($this->viewPath . '.edit', compact('pharmacy'));
    }

    /**
     * Update the specified pharmacy in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->update($request->all());
        return redirect()->route($this->baseRoute)->with('success', 'Pharmacy updated successfully');
    }

    /**
     * Remove the specified pharmacy from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->delete();
        return redirect()->route($this->baseRoute)->with('success', 'Pharmacy deleted successfully');
    }
}
