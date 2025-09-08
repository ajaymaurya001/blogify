<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showloginform()
    {
        return view('login_page');
    }



    public function forget_pass(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // 1. Check if email exists
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Email not registered, Please register first');
        }

        // $newPassword = Str::random(8);
        // $user->password = Hash::make($newPassword);

        
        $newPassword = 123456;
        $user->password = $newPassword;
        $user->save();

        // 4. Send email with new password
        try {
            Mail::raw(
                "Hello {$user->name},\n\nYour password has been reset.\nNew Password: {$newPassword}\n\nPlease login and change it immediately.",
                function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('Your New temperory Password');
                }
            );
        } catch (\Exception $e) {
            return back()->with('error', 'Could not send reset email. Please try again later.');
        }

        // 5. Redirect to login page
        return redirect()->route('login')->with('success', 'A new password has been sent to your email.');
    }



    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            if (Auth::user()->is_admin) {
                return redirect()->route('admin_dashboard');
            }
            return redirect()->route('user_dashboard');
        }
        return back()->with('error', 'Invalid login credentials.');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
