<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class OtpController extends Controller
{
    private $otpStore = [];

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;
        $otp = random_int(100000, 999999);

        $this->otpStore[$email] = $otp;

        $mailConfig = [
            'driver' => 'smtp',
            'host' => 'live.smtp.mailtrap.io',
            'port' => 587,
            'username' => 'api',
            'password' => 'e90e9e8a04efa720d9602e2aad78376b',
            'encryption' => 'tls',
            'from' => ['address' => 'hello@demomailtrap.com', 'name' => 'PHP_LARAVEL'],
        ];

        Mail::mailer('smtp')->setMailConfig($mailConfig)->send(new \Illuminate\Mail\Message(function ($message) use ($email, $otp, $mailConfig) {
            $message->from($mailConfig['from']['address'], $mailConfig['from']['name'])
                    ->to($email)
                    ->subject('Mã OTP Của Bạn')
                    ->setBody("Mã OTP dùng để thay đổi mật khẩu của bạn là $otp", 'text/plain');
        }));

        return response()->json(['message' => 'OTP sent successfully'], 200);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
            'newPassword' => 'required|min:6',
        ]);

        $email = $request->email;
        $otp = $request->otp;
        $newPassword = $request->newPassword;

        if (isset($this->otpStore[$email]) && $this->otpStore[$email] == $otp) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->password = Hash::make($newPassword);
                $user->save();
            }
            unset($this->otpStore[$email]);

            return response()->json(['message' => 'Password changed successfully'], 200);
        } else {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }
    }
}