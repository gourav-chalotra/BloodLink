<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verification;
use App\Models\Donor;
use Illuminate\Support\Facades\Hash;

class DonateBloodController extends Controller
{
    public function show()
    {
        return view('Donateblood.donatepage');
    }

    public function showVerifyForm($phone)
    {
        return view('Donateblood.verify', ['phone' => $phone]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^[0-9]{10}$/|unique:users,phone',
            'location' => 'required|string|max:255',
            'blood_group' => 'required|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'password' => 'required|string|min:6|confirmed', // Add password field
        ]);

        // Create user with hashed password
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Create donor record
        $donor = Donor::create([
            'user_id' => $user->id,
            'blood_group' => $request->blood_group,
        ]);

        // Generate OTP for verification
        $otp = rand(100000, 999999);

        // Create verification record
        Verification::create([
            'user_id' => $user->id,
            'phone' => $user->phone,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        // Redirect to verification page with success message
        return redirect()->route('donate.verify', ['phone' => $user->phone])
            ->with('message', 'An OTP has been sent to your phone. Please verify.');
    }

    public function verify(Request $request, $phone)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $verification = Verification::where('phone', $phone)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if ($verification) {
            $verification->delete(); // Clear verification record
            return redirect()->route('donate.success')
                ->with('success', 'Verification successful! You are now a registered donor.');
        }

        return redirect()->back()
            ->withErrors(['otp' => 'Invalid or expired OTP. Please try again.'])
            ->withInput();
    }

    public function success()
    {
        return view('Donateblood.success')->with('success', session('success'));
    }
}