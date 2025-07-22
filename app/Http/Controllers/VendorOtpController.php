<?php
namespace App\Http\Controllers;

use App\Mail\VendorOtpMail;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VendorOtpController extends Controller
{
    public function showOtpForm()
    {
        $user = Auth::user();
        return view('vendor.otp-form', compact('user'));
    }

    public function sendOtp(Request $request)
    {
        $user = Auth::user();
        $otp = rand(100000, 999999);

        Otp::updateOrCreate(
            ['user_id' => $user->id],
            ['otp' => $otp, 'expires_at' => now()->addMinutes(10)]
        );

        Mail::to($user->email)->send(new VendorOtpMail($otp));

        return redirect()->route('vendor.verify-otp')->with('status', 'OTP sent to your email.');
    }

    public function resendOtp(Request $request)
    {
        $user = Auth::user();
        $otp = rand(100000, 999999);

        Otp::updateOrCreate(
            ['user_id' => $user->id],
            ['otp' => $otp, 'expires_at' => now()->addMinutes(10)]
        );

        Mail::to($user->email)->send(new VendorOtpMail($otp));

        return redirect()->route('vendor.verify-otp')->with('status', 'New OTP sent to your email.');
    }

    public function showVerifyOtpForm()
    {
        return view('vendor.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $user = Auth::user();
        $otpRecord = Otp::where('user_id', $user->id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if ($otpRecord) {
            $user->update(['role' => 'vendor']);
            $otpRecord->delete();
            return redirect()->route('dashboard')->with('status', 'You are now a vendor!');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }

    public function dashboard()
    {
        $user = Auth::user();
        if ($user->role !== 'vendor') {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        return view('dashboard');
    }
}