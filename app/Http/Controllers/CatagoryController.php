<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catagory = Catagory::all(); // fetch all users
        return view('admin.catagory._all_catagory', compact('catagory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catagory._create_new_catagory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // 1. Validate request
        $request->validate([
            'title'       => 'required|string|max:50|unique:catagories,title',
            'slug'        => 'required|unique:catagories,slug',
            'description' => 'required|string|max:255',
            'image'     => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
            'status'      => 'required|in:1,0',
        ]);
        // dd($request->cat_img);


        $newName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $newName = now()->format('Ymd_His') . '.' . $originalName . '.' . $extension;
            $file->move(public_path('uploads/categories'), $newName);
        }

        $category = Catagory::create([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'description' => $request->description,  // fixed typo (was discription)
            'image'       => $newName,             // only store file name
            'status'      => $request->status,
        ]);

        return back()->with('success', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catagory = Catagory::findOrFail($id);
        return view('admin.catagory._edit_catagory', compact('catagory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'       => 'required|string|max:50|unique:catagories,title,' . $id,
            'slug'        => 'required|unique:catagories,slug,' . $id,
            'description' => 'required|string|max:255',
            'image'       => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
            'status'      => 'required|in:1,0',
        ]);

        // 2. Find category
        $category = Catagory::findOrFail($id);

        // 3. Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists and not default
            if ($category->image && File::exists(public_path('uploads/categories/' . $category->image))) {
                File::delete(public_path('uploads/categories/' . $category->image));
            }

            // Save new image
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $newName = now()->format('Ymd_His') . '.' . $originalName . '.' . $extension;
            $file->move(public_path('uploads/categories'), $newName);

            $category->image = $newName;
        }

        // 4. Update other fields
        $category->title       = $request->title;
        $category->slug        = $request->slug;
        $category->description = $request->description;
        $category->status      = $request->status;

        // 5. Save changes
        $category->save();

        return redirect()->route('catagory.index')->with('success', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cat_id)
    {
        $catagory = Catagory::findOrFail($cat_id);
        if (Auth::id() == $catagory->$cat_id) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        $catagory->delete();
        return back()->with('success', 'User deleted successfully!');
    }
}
