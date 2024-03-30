<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Http\Requests\RequestRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class RequestController extends Controller
{
    protected $requestModel;
    protected $baseRoute = 'requests.index';
    protected $viewPath = 'backend.requests';

    public function __construct(RequestModel $requestModel)
    {
        $this->requestModel = $requestModel;
    }

    public function index()
    {
        $requests = auth()->user()->hasRole('admin') 
            ? RequestModel::all() 
            : auth()->user()->requests;

        return view($this->viewPath . '.index', compact('requests'));
    }

    public function create()
    {
        return view($this->viewPath . '.create');
    }

    public function store(RequestRequest $request)
    {
        try {
            $requestData = $request->validated();
            $requestData['user_id'] = auth()->id();
            $this->requestModel->create($requestData);
            return redirect()->route($this->baseRoute)->with('success', 'Request created successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route($this->baseRoute)->with('error', 'Oops! Something went wrong!');
        }
    }

    public function edit(RequestModel $request)
    {
        return view($this->viewPath . '.edit', compact('request'));
    }

    public function update(RequestRequest $updateRequest, RequestModel $request)
    {
        try {
            $requestData = $updateRequest->validated();
         $request->update($requestData);
         return redirect()->route($this->baseRoute)->with('success', 'Request updated successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
         return redirect()->route($this->baseRoute)->with('error', 'Oops! Something went wrong!');
    }
    }


    public function destroy(RequestModel $request)
    {
        try {
            $request->delete();
            return redirect()->route($this->baseRoute)->with('success', 'Request deleted successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route($this->baseRoute)->with('error', 'Oops! Something went wrong!');
        }
    }
}
