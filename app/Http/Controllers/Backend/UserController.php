<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;


class UserController extends Controller
{
    protected $baseRoute = 'users.index';
    protected $viewPath = 'backend.users';

    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('userSearch')) {
            $searchTerm = $request->userSearch;

            if ($searchTerm === 'male' || $searchTerm === 'female' || $searchTerm === 'other') {
                $query->where('gender', $searchTerm);
            } else {
            // If not a gender term, perform general search
                $this->searchUsers($query, $searchTerm);
            }
    }

    $users = $query->paginate(10);

    return view($this->viewPath . '.index', compact('users'));
    }


    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view($this->viewPath . '.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Store the original user type before the update
        $originalUserType = $user->type;

        // Update the user attributes
        $user->update($request->all());

        // Check if the user type has been changed to "doctor" and if it wasn't already a "doctor"
        if ($user->type === 'doctor' && $originalUserType !== 'doctor') {
            // Create a new Doctor instance
            $doctor = new Doctor([
                // You can assign other attributes of the doctor here
                'user_id' => $user->id,
                // Assign other attributes like department_id, experience, qualification, etc.
            ]);
            
            // Save the doctor record
            $doctor->save();
        } elseif ($user->type !== 'doctor' && $originalUserType === 'doctor') {
            // If the user type was changed from "doctor" to something else
            // Delete the corresponding doctor record
            $user->doctor()->delete();
        }

        return redirect()->route($this->baseRoute)->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route($this->baseRoute)->with('success', 'User deleted successfully');
    }

    private function searchUsers($query, $searchTerm)
    {
        return $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', $searchTerm)
                    ->orWhere('location', 'like', '%' . $searchTerm . '%')
                    ->orWhere('type', 'like', '%' . $searchTerm . '%');
    }

}

