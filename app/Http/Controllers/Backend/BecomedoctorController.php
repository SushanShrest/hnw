<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Becomedoctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BecomedoctorController extends Controller
{
    protected $baseRoute = 'becomedoctors.index';
    protected $userRoute = 'becomedoctors.display';
    protected $viewPath = 'backend.becomedoctors';


    //FOR ADMIN PANEL
    public function index(Request $request)
{
    $query = Becomedoctor::query();

    // Search by user name
    if ($request->has('userSearch')) {
        $query->whereHas('user', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->userSearch . '%');
        });
    }

    // Search by medical license
    if ($request->has('search')) {
        $query->where('medical_license', 'like', '%' . $request->search . '%');
    }

    // Filter by status
    if ($request->has('status')) {
        $query->where('status', $request->status);
    }

    $becomedoctors = $query->get();

    return view($this->viewPath . '.index', compact('becomedoctors'));
}


    public function edit($id)
    {
        $becomedoctor = Becomedoctor::findOrFail($id);

        // Check if the status is 'accepted'
        if ($becomedoctor->status === 'accepted') {
            return redirect()->route($this->baseRoute)->with('error', 'You cannot edit anymore after being verified. ');
        }

        return view($this->viewPath . '.edit', compact('becomedoctor'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'medical_license' => 'required|string|unique:becomedoctors|integer|digits:10',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'status' => 'required|string',
        ]);

        $input = $request->all();

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/becomedoctors'), $fileName);
            $input['file'] = $fileName;
        }

        $becomedoctor = Becomedoctor::findOrFail($id);
        $becomedoctor->update($input);

        return redirect()->route($this->baseRoute)->with('success', 'Becomedoctor updated successfully');
    }

    public function destroy($id)
    {
        $becomedoctor = Becomedoctor::findOrFail($id);

        $this->deleteFile($becomedoctor->file);

        $becomedoctor->delete();

        return redirect()->route($this->baseRoute)->with('success', 'Becomedoctor deleted successfully');
    }

    public function show($id)
    {

        $becomedoctor = Becomedoctor::findOrFail($id);
        $user = $becomedoctor->user; // Assuming there is a relationship between Becomedoctor and User model

        return view($this->viewPath . '.show', compact('user', 'becomedoctor'));
    }

    //USER PANEL
    public function display()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve the Becomedoctor records associated with the user
        $becomedoctors = Becomedoctor::where('user_id', $user->id)->get();

        // Pass the becomedoctors variable to the view
        return view($this->viewPath . '.display', compact('becomedoctors'));
    }

    public function usercreate()
    {
        // Check if the user already has a Becomedoctor record
        $user = Auth::user();
        $becomedoctor = $user->becomedoctor;

        if ($becomedoctor) {
            return redirect()->route($this->userRoute)->with('error', 'You have already submitted a become a doctor form.');
        }
    
        return view($this->viewPath . '.usercreate', compact('becomedoctor'));
    }


    public function userstore(Request $request)
    {
        $user = Auth::user();

        // Check if the user already has a Becomedoctor record
        if ($user->becomedoctor) {
            return redirect()->route($this->userRoute)->with('error', 'You have already submitted a become a doctor form.');
        }

        $request->validate([
            'medical_license' => 'required|string|unique:becomedoctors|integer|digits:10',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'status' => 'required|string',
        ]);        

        $input = $request->all();

        // Handle file upload
        $fileName = $this->uploadFile($request->file('file'));

        // Assign uploaded file name to input
        $input['file'] = $fileName;
        $user->becomedoctor()->create($input);

        return redirect()->route($this->userRoute)->with('success', 'Becomedoctor created successfully');
    }


    public function useredit($id)
{
    $becomedoctor = Becomedoctor::findOrFail($id);

    // Check if the authenticated user matches the user associated with the become record
    if (Auth::user()->id != $becomedoctor->user_id) {
        return redirect()->route($this->userRoute)->with('error', 'You are not authorized to edit this record.');
    }

    // Check if the status is 'accepted'
    if ($becomedoctor->status === 'accepted') {
        return redirect()->route($this->userRoute)->with('error', 'You cannot edit anymore after being accepted.');
    }

    return view($this->viewPath . '.useredit', compact('becomedoctor'));
}

public function userupdate(Request $request, $id)
{
    $request->validate([
        'medical_license' => 'required|string|unique:becomedoctors|integer|digits:10',
        'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        'status' => 'required|string',
    ]);

    $input = $request->all();

    // Handle file upload
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/becomedoctors'), $fileName);
        $input['file'] = $fileName;
    }

    $becomedoctor = Becomedoctor::findOrFail($id);

    // Check if the authenticated user matches the user associated with the become record
    if (Auth::user()->id != $becomedoctor->user_id) {
        return redirect()->route($this->userRoute)->with('error', 'You are not authorized to update this record.');
    }

    $becomedoctor->update($input);

    return redirect()->route($this->userRoute)->with('success', 'Becomedoctor updated successfully');
}
    
    public function usershow($id)
    {
        // Retrieve the authenticated user
        $authenticatedUser = Auth::user();

        // Retrieve the Becomedoctor record associated with the provided ID
        $becomedoctor = Becomedoctor::findOrFail($id);

        // Check if the authenticated user has the same ID as the user associated with the Becomedoctor record
        if ($authenticatedUser->id != $becomedoctor->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to view this page.');
        }

        // Retrieve the user associated with the Becomedoctor record
        $user = $becomedoctor->user;

        return view($this->viewPath . '.usershow', compact('user', 'becomedoctor'));
    }

// Method to handle file uploads
    private function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/becomedoctors'), $fileName);
        return $fileName;
    }

// Method to handle file deletions
    private function deleteFile($fileName)
    {
        $filePath = public_path('uploads/becomedoctors/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
