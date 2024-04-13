<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = Message::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('user')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->user . '%');
            });
        }

        $messages = $query->paginate(10);
        return view('backend.messages.index', compact('messages'));
    }


    public function userindex(Request $request)
    {
        $query = Message::where('user_id', Auth::id())->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $messages = $query->paginate(10);
        return view('backend.messages.userindex', compact('messages'));
    }



    public function create()
    {
        return view('backend.messages.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'status' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'reply' => 'nullable|string|max:255'
        ]);

        $message = new Message();
        $message->user_id = Auth::id();
        $message->title = $request->title;
        $message->message = $request->message;
        $message->status = $request->status;
        $message->reply = $request->reply;

        if ($request->hasFile('image')) {
            $message->image = $this->uploadFile($request->file('image'));
        }

        $message->save();

        return redirect()->route('messages.userindex')->with('success', 'Message successfully created.');
    }


    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('backend.messages.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        $request->validate([
            'status' => 'required|string|max:255',
            'reply' => 'required|string|max:1000',
        ]);

        $message->status = $request->status;
        $message->reply = $request->reply;
        $message->save();

        return redirect()->route('messages.index')->with('success', 'Message updated successfully.');
    }


    public function destroy(Message $message)
    {
        if ($message->image) {
            $this->deleteFile($message->image);
        }

        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Message successfully deleted.');
    }


    public function show($id)
    {
        $message = Message::with('user')->findOrFail($id);
        return view('backend.messages.show', compact('message'));
    }


    public function usershow($id)
    {
        $message = Message::where('id', $id)->where('user_id', Auth::id())->first();

        if ($message) {
            return view('backend.messages.usershow', compact('message'));
        } else {
            return redirect()->route('messages.userindex')->with('error', 'Not authorized to view this message.');
        }
    }


    private function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/messages'), $fileName);
        return $fileName;
    }


    private function deleteFile($fileName)
    {
        $filePath = public_path('uploads/messages/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
