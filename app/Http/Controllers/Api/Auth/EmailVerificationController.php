<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SendMail;
use App\Models\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
  public function resendEmailVerification(Request $request)
  {
    $request->validate([
      'email' => 'required|exists:users'
    ]);

    $user = User::where('email', $request->email)->where('email_verified_at', null)->first();

    if (!$user) {
      return response()->json(['status' => '500', 'message' => 'Akun tidak ditemukan atau sudah terverifikasi!'], 500);
    }

    //send email verification
    $url = env('SMARTATTENDANCE_URL') . 'email-verification/' . $user->emailVerification->token;
    $sendMail = new SendMail();
    $sendMail->emailVerification($request, $url);

    return response()->json(['status' => '200', 'message' => 'Sukses Mengirim Verifikasi Email!'], 200);
  }
}
