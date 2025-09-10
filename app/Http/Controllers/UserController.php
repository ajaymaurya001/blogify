<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // fetch all users
        return view('admin._all_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registration_page');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    // 1. Validate request
    $request->validate([
        'name'   => 'required|string|max:50',
        'email'  => 'required|email|max:50|unique:users',
        'mobile' => 'required|string|max:50',
        'dob'    => 'required|date',
        'gender' => 'required|in:male,female,other',
        'bio'    => 'required|string|max:150',
        'is_admin' => Auth::check() && Auth::user()->is_admin ? 'required|boolean' : '',
    ]);

    // 2. Generate random password (hardcoded for testing)
    $userPassword = 123456;

    // 3. Try sending email first
    try {
        Mail::raw(
            "Registration Success !! {$request->name},\n\nYour account has been created successfully.\n\nEmail: {$request->email}\nPassword: {$userPassword}",
            function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Blogify Login Details');
            }
        );
    } catch (\Exception $e) {
        Log::error("Mail could not be sent to {$request->email}. Error: " . $e->getMessage());
        return back()->with('error', 'We could not send an email to your address. Please check your email or try again.');
    }

    // 4. Only save user if email succeeds
    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'mobile'   => $request->mobile,
        'dob'      => $request->dob,
        'gender'   => $request->gender,
        'bio'      => $request->bio,
        'password' => Hash::make($userPassword),
        'is_admin' => Auth::check() && Auth::user()->is_admin ? (bool) $request->is_admin : 0,
    ]);

    // 5. Return response
    if (Auth::check() && Auth::user()->is_admin) {
        return back()->with('success', 'User added successfully by admin! Login details sent via email.');
    }

    return redirect()->route('login')->with('success', 'Account created successfully! Login details have been sent to your email.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin._show_user_profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin._edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validate input
        $rules = [
            'name'   => 'required|string|max:50',
            'email'  => 'required|email|max:50',
            'mobile' => 'required|string|max:50',
            'dob'    => 'required|date',
            'gender' => 'required|in:male,female,other',
            'bio'    => 'required|string|max:150',
        ];

        if (Auth::check() && Auth::user()->is_admin) {
            $rules['is_admin'] = 'required|boolean';
        }

        $request->validate($rules);

        // Prepare data
        $data = [
            'name'   => $request->name,
            'email'  => $request->email,
            'mobile' => $request->mobile,
            'dob'    => $request->dob,
            'gender' => $request->gender,
            'bio'    => $request->bio,
        ];

        // Only admins can update is_admin field
        if (Auth::check() && Auth::user()->is_admin) {
            $data['is_admin'] = $request->is_admin;
        }

        $user->update($data);

        return redirect()->back()->with('success', 'User updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Optional: prevent admin from deleting themselves
        if (Auth::id() == $user->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        $user->delete();
        return back()->with('success', 'User deleted successfully!');
    }
}
