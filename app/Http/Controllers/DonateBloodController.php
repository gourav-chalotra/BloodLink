<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;

class DonateBloodController extends Controller
{
    public function show()
    {
        return view('Donateblood.donatepage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:donors,email',
            'phone' => 'required|regex:/^[0-9]{10}$/|unique:donors,phone',
            'location' => 'required|string|max:255',
            'blood_group' => 'required|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
        ]);

        // Create donor record directly
        Donor::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'blood_group' => $request->blood_group,
        ]);

        // Redirect to success page with message
        return redirect()->route('donate.success')
            ->with('success', 'Thank you for registering as a donor!');
    }

    public function success()
    {
       return view('donateblood.success');
    }
}