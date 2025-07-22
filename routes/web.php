<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\VendorOtpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('product');
})->name('home');

Route::get('/cart', function () {
    return view('users.cart');
})->name('cartPage');

Route::get('/contact', function () {
    return view('users.contact');
})->name('contactPage');

Route::controller(SocialiteController::class)->group(function(){

    Route::get('/auth/redirection/{provider}','authProviderRedirect')->name('auth.redirection');
    Route::get('/auth/{provider}/callback','socialAuthentication')->name('auth.callback');
});

Route::get('/vendor/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','vendor'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/vendor/otp', [VendorOtpController::class, 'showOtpForm'])->name('vendor.otp-form');
    Route::post('/vendor/send-otp', [VendorOtpController::class, 'sendOtp'])->name('vendor.send-otp');
    Route::post('/vendor/resend-otp', [VendorOtpController::class, 'resendOtp'])->name('vendor.resend-otp');
    Route::get('/vendor/verify-otp', [VendorOtpController::class, 'showVerifyOtpForm'])->name('vendor.verify-otp');
    Route::post('/vendor/verify-otp', [VendorOtpController::class, 'verifyOtp'])->name('vendor.verify-otp');
});

require __DIR__.'/auth.php';
