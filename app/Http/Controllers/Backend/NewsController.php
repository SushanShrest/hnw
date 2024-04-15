<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(10);
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created news in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/news'), $imageName); 
        $validatedData['image'] = $imageName;
    }

    $news = News::create($validatedData);

    return redirect()->route('news.index')->with('success', 'News created successfully.');
    }


    /**
     * Show the form for editing the specified news.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('backend.news.edit', compact('news'));
    }

    /**
     * Update the specified news in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
        ]);

        // Handle file upload if a new image is provided in the request
        if ($request->hasFile('image')) {
            // Delete the existing image file
            if ($news->image) {
                unlink(public_path('uploads/news/' . $news->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/news'), $imageName); 
            $validatedData['image'] = $imageName;
        }

        $news->update($validatedData);

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }


    /**
     * Remove the specified news from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }

    /**
     * Display the specified news.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        
        $news = News::findOrFail($id);
        return view('backend.news.show', compact('news'));
    }

    public function display()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(6);

        return view('backend.news.display', compact('news'));
    }

}
