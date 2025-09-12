<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogs = Blog::latest();
        $categories = Catagory::all();

        // Filter by category if query param exists
        if ($request->filled('category')) {
            $blogs->where('catagory_id', $request->category);
        }

        // Execute query
        $blogs = $blogs->get();

        return view('admin.blogs._index_blog', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Catagory::all();
        return view('admin.blogs._create_blog', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate request
        $request->validate([
            'title'            => 'required|string|max:255|unique:blogs,title',
            'slug'             => 'required|string|max:255|unique:blogs,slug',
            'description'      => 'required|string',
            'catagory_id'      => 'required|exists:catagories,id',
            'image'            => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
            'status'           => 'required|in:1,0',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',
            'meta_keyphrase'   => 'nullable|string|max:255',
        ]);

        // 2. Handle image upload
        $newName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $newName = now()->format('Ymd_His') . '.' . $originalName . '.' . $extension;

            // Save inside "uploads/posts_img"
            $file->move(public_path('uploads/posts_img'), $newName);
        }

        // 3. Store blog
        $blog = Blog::create([
            'title'            => $request->title,
            'slug'             => $request->slug,
            'content'          => $request->description, // your DB column is "content"
            'catagory_id'      => $request->catagory_id,
            'user_id'          => Auth::id(), // assign logged-in user
            'image'            => $newName,   // store file name only
            'status'           => $request->status,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords'    => $request->meta_keywords,
            'meta_keyphrase'   => $request->meta_keyphrase,
        ]);

        // 4. Redirect back with success
        return redirect()->back()->with('success', 'Blog added successfully!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Blog $blog)
    public function show($id)
    {
        $categories = Catagory::all();
        $blogs = Blog::with('category', 'user')->findOrFail($id);
        $relatedBlogs = Blog::where('catagory_id', $blogs->catagory_id)
            ->where('id', '!=', $blogs->id)
            ->latest()
            ->get();

        return view('admin.blogs._show_blog', compact('blogs', 'categories', 'relatedBlogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
