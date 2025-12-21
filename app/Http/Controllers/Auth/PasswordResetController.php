<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\PasswordResetOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    /**
     * Show forgot password form
     */
    public function showForgot()
    {
        return view('auth.forgot');
    }

    /**
     * Send OTP to email
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak terdaftar.',
        ]);

        $email = $request->email;

        // Create OTP
        $otp = PasswordResetOtp::createForEmail($email);

        // Send email
        Mail::to($email)->send(new OtpMail($otp->otp));

        // Store email in session for verification
        session(['reset_email' => $email]);

        return redirect('/auth/verify')->with('success', 'Kode OTP telah dikirim ke email Anda.');
    }

    /**
     * Show OTP verification form
     */
    public function showVerify()
    {
        if (!session('reset_email')) {
            return redirect('/auth/forgot')->withErrors(['email' => 'Silakan masukkan email terlebih dahulu.']);
        }

        return view('auth.verify');
    }

    /**
     * Verify OTP code
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ], [
            'otp.required' => 'Kode OTP wajib diisi.',
            'otp.size' => 'Kode OTP harus 6 digit.',
        ]);

        $email = session('reset_email');

        if (!$email) {
            return redirect('/auth/forgot')->withErrors(['email' => 'Session expired. Silakan mulai ulang.']);
        }

        // Find valid OTP
        $otpRecord = PasswordResetOtp::where('email', $email)
            ->where('otp', $request->otp)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otpRecord) {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid atau sudah kadaluarsa.']);
        }

        // Mark OTP as verified (but not used yet - used after password reset)
        session(['otp_verified' => true]);

        return redirect('/auth/new-password');
    }

    /**
     * Show new password form
     */
    public function showNewPassword()
    {
        if (!session('reset_email') || !session('otp_verified')) {
            return redirect('/auth/forgot')->withErrors(['email' => 'Silakan verifikasi OTP terlebih dahulu.']);
        }

        return view('auth.new-password');
    }

    /**
     * Reset password
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:7', 'confirmed'],
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 7 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $email = session('reset_email');

        if (!$email || !session('otp_verified')) {
            return redirect('/auth/forgot')->withErrors(['email' => 'Session expired. Silakan mulai ulang.']);
        }

        // Update password
        $user = User::where('email', $email)->first();
        $user->update(['password' => Hash::make($request->password)]);

        // Mark all OTPs for this email as used
        PasswordResetOtp::where('email', $email)->update(['is_used' => true]);

        // Clear session
        session()->forget(['reset_email', 'otp_verified']);

        return redirect('/auth/login')->with('success', 'Password berhasil diubah. Silakan login.');
    }
}
