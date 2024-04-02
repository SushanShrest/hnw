<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

    // Check if search term is provided
        if ($request->has('userSearch')) {
            $searchTerm = $request->userSearch;

        // Check if search term is one of the gender options
            if ($searchTerm === 'male' || $searchTerm === 'female' || $searchTerm === 'other') {
                $query->where('gender', $searchTerm);
            } else {
            // If not a gender term, perform general search
                $this->searchUsers($query, $searchTerm);
            }
    }

    $users = $query->get();

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
        $user->update($request->all());
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

