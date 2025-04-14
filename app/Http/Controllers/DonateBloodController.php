<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verification;
use App\Models\Donor;

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
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^[0-9]{10}$/|unique:users',
            'location' => 'required',
            'blood_group' => 'required|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
        ]);
        
        // Create user with password
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'password' => bcrypt('default_password'), // Set a default password or add password field to form
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
    
        // Redirect to verification page
        return redirect()->route('donate.verify', ['phone' => $user->phone])
            ->with('message', 'An OTP has been sent to your phone. Please verify.');
    }
}
