<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Exception;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    protected $department;
    protected $baseRoute = 'departments.index';
    protected $viewPath = 'backend.departments';

    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    public function index()
    {
        // $this->authorize('read-department');
        $departments = $this->department->get();
        return view($this->viewPath . '.index', compact('departments'));
    }


    public function create()
    {
        $department = $this->department;
        return view($this->viewPath . '.create', compact('department'));
    }


    public function store(DepartmentRequest $request)
    {
        // $this->authorize('create-department');
        try {
            //upload file
            $fileName = $this->uploadFile($request->file, 'uploads/departments');

            //prepare data
            $input = $request->validated();

            //override file name
            $input['file'] = $fileName;

            $this->department->create($input);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route($this->baseRoute)->with('error', 'Oops! Something went wrong!');
        }

        return redirect()->route($this->baseRoute)->with('success', 'Department Saved Successfully!');
    }

    public function display()
    {
        $departments = $this->department->get();
        return view($this->viewPath . '.display', compact('departments'));
    }


    public function edit($id)
    {
        try {
            $department = $this->department->findOrFail($id);
            // $this->authorize('update-department', $department);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route($this->baseRoute . '.index')->with('error', 'Oops! Something went wrong!');
        }

        return view($this->viewPath . '.edit', compact('department'));
    }


    public function update(DepartmentRequest $request, $id)
    {
        try {
            $department = $this->department->findOrFail($id);
            // $this->authorize('update-department', $department);
           
            //prepare data
            $input = $request->validated();

            if ($request->has('file')) {
                //unlink old files
                if (!empty($department->file)) {
                    $this->deleteFile($department->file, 'uploads/departments');
                }
                //upload new files
                $fileName = $this->uploadFile($request->file, 'uploads/departments');

                //override file name
                $input['file'] = $fileName;
            }

            // $this->authorize('update-department', $department);
            $department->update($input);

            
            // $department->update($request->validated());
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route($this->baseRoute)->with('error', 'Oops! Something went wrong!');
        }

        return redirect()->route($this->baseRoute)->with('success', 'Department Updated Successfully!');
    }


    public function destroy($id)
    {
        try {
            $department = $this->department->findOrFail($id);
            // $this->authorize('delete-department', $department);
            $department->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route($this->baseRoute)->with('error', 'Oops! Something went wrong!');
        }

        return redirect()->route($this->baseRoute)->with('success', 'Department Deleted Successfully!');
    }

    private function uploadFile($image, $path) // Uploads an image file to the specified path and returns the generated filename.
    {
        if (!file_exists($path)) {
            mkdir($path, 077, true); // Create the directory if it doesn't exist.
        }
        $fname = date('Y-m-d-h-m-s') . '_' . $image->getClientOriginalName();
        $image->move($path, $fname); // Move the uploaded file to the specified path.
        return $fname;
    }

    private function deleteFile($image, $path) //Deletes a file from the specified path if it exists and is not empty.
    {
        //check if file exists or not.
        if (file_exists($path . $image) && !empty($image)) {
            @unlink($path . $image); // Delete the file if it exists.
        }

    }
}
