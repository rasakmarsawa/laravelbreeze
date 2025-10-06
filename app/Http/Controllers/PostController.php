<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ 
            'title' => ['required'],
            'text' => ['required'],
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => ['required'],
        ]);        

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('posts', 'public');
            $validated['photo'] = $path;
        }

        Post::create($validated);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = category::all();

        return view('posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([ 
            'title' => ['required'],
            'text' => ['required'],
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => ['required'],
        ]);        

        if ($request->hasFile('photo')) {
            if ($post->photo && Storage::disk('public')->exists($post->photo)) {
                Storage::disk('public')->delete($post->photo);
            }

            $path = $request->file('photo')->store('posts', 'public');
            $validated['photo'] = $path;
        }        

        $post->update($validated);       

        return redirect()->route('posts.show',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->photo && Storage::disk('public')->exists($post->photo)) {
            Storage::disk('public')->delete($post->photo);
        }

        $post->delete();

        return redirect()->route('posts.index');
    }

    public function removePhoto(Post $post)
    {
        if ($post->photo && Storage::disk('public')->exists($post->photo)) {
            Storage::disk('public')->delete($post->photo);
            $post->update(['photo' => null]);
        }

        return back()->with('success', 'Image removed successfully!');
    }    
}
