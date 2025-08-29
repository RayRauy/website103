<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Post::latest()->get();
        return view('posts.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'sub_title' => 'nullable|max:200',
            'description' => 'nullable|max:200',
            'content' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'required|in:0,1',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads');
            $file->move($destinationPath, $fileName);
            $imagePath = 'uploads/' . $fileName; 
        }
    
        
        Post::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'content' => $validated['content'],
            'active' => $request->active,
            'image' => $imagePath, 
        ]);
    
        return redirect()->route('post.index');
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
        $row = Post::findOrFail($id);
        return view('posts.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'sub_title' => 'nullable|max:200',
            'description' => 'nullable|max:200',
            'content' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'required|in:0,1',
        ]);

        $row = Post::findOrFail($id);

        if ($row->image && file_exists(public_path($row->image))) {
            unlink(public_path($row->image));
        }

        // Default to existing image
        $imagePath = $row->image;

        // Handle new image upload if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads');
            $file->move($destinationPath, $fileName);
            $imagePath = 'uploads/' . $fileName;
        }

        // Update post
        $row->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'content' => $validated['content'],
            'active' => $request->active,
            'image' => $imagePath, // either old or new image
        ]);
        
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Post::findOrFail($id);

        // Delete image file if exists
        if ($row->image && file_exists(public_path($row->image))) {
            unlink(public_path($row->image));
        }

        $row->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
    }
}
