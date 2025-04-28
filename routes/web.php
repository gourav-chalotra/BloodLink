<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonateBloodController;
use App\Http\Controllers\NeedBloodController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\AuthorCollection;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/home', function () {
    return view('home');
})->name('home');


// Need Blood routes
Route::get('/home/needblood', [NeedBloodController::class, 'needbloodPage'])->name('need.show');
Route::post('/home/needblood', [NeedBloodController::class, 'needBloodFormVerification'])->name('need.store');
Route::post('/logout', [NeedBloodController::class, 'logout'])->name('logout');
// Donate Blood routes
// Donate Blood routes
Route::get('/home/donateblood', [DonateBloodController::class, 'show'])->name('donate.show');
Route::post('/home/donateblood', [DonateBloodController::class, 'store'])->name('donate.store');
Route::get('/donate/success', [DonateBloodController::class, 'success'])->name('donate.success');
Route::get('/getdata',function(){
    $customers = User::all();
    echo "<pre>";
    print_r($customers->toArray()[0]['username']);
});