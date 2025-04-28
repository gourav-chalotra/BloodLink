<?php

namespace App\Http\Controllers;
use App\Models\Donor;
use Illuminate\Http\Request;
use App\Models\Needer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class NeedBloodController extends Controller
{
    public function needbloodPage()
    {
        return view('Needblood.needpage');
    }

    public function needBloodFormVerification(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:4',
            'phone' => 'required|digits:10',
            'location' => 'required',
            'blood_group' => 'required',
        ]);
        
        $prevUsers = Needer::pluck('phone')->toArray();

        $newNeeder = new Needer;
        $newNeeder->name = $request['username'];
        $newNeeder->email = $request['email'];
        $newNeeder->password = md5($request['password']);
        $newNeeder->phone = $request['phone'];
        $newNeeder->location = $request['location'];
        $newNeeder->blood_group_needed = $request['blood_group'];
        $newNeeder->save();

        session()->put('username', $request->input('username'));
        session()->put('email', $request->input('email'));
        session()->put('password', bcrypt($request->input('password')));
        session()->put('phone', $request->input('phone'));
        session()->put('location', $request->input('location'));

        $donors = Donor::get(['username', 'location', 'phone']);
        return view('Needblood.user_home', compact('donors'));
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/home');
    }
}