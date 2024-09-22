<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OTPController extends Controller
{
    // Show the OTP form after login
    public function showOTPForm()
    {
        return view('auth.otp-verify');
    }

    // Verify OTP after form submission
    public function verifyOTP(Request $request)
    {
        // Validate the OTP input
        $request->validate([
            'otp' => 'required|numeric|digits:4',
        ]);

        // Check if the OTP matches the one in the session
        if ($request->otp == Session::get('otp')) {
            // OTP is correct, so clear it from the session
            Session::forget('otp');

            // Redirect to dashboard or products page
            return redirect()->route('dashboard')->with('success', 'OTP verified successfully!');
        }

        // OTP did not match
        return back()->withErrors(['otp' => 'Invalid OTP']);
    }

    // Handle login and send OTP
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Generate a random OTP
            $otp = rand(1000, 9999);

            // Store OTP in session
            Session::put('otp', $otp);

            // Send OTP to user's email
            Mail::raw("Your OTP is $otp", function($message) use ($request) {
                $message->to($request->email)->subject('OTP Verification');
            });

            // Redirect to the OTP verification page
            return redirect()->route('otp.verify')->with('success', 'OTP has been sent to your email.');
        }

        // Failed login
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
