<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
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
        //
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
    ]);

    // 2. Generate random password
    $userPassword = Str::random(12);

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
        Log::error("Mail could not be sent to {$request->email}. Error: ".$e->getMessage());
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
    ]);

    // 5. Redirect to login with success message
    return redirect()->route('login')->with('success', 'Account created successfully! Login details have been sent to your email.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
