<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SendMail;
use App\Http\Controllers\Helper\SendMailjet;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
  public function forgotPassword(Request $request)
  {
    $request->validate([
      'email' => 'required|exists:users'
    ]);

    $token = bin2hex(random_bytes(16));
    $url = env('SMARTATTENDANCE_URL', 'https://app.attendance.smartbiz.id/') . 'reset-password/' . $token;

    DB::beginTransaction();
    PasswordReset::updateOrCreate(
      //condition
      ['email' => $request->email],
      //value
      ['token' => $token]
    );

    // $sendMail = new SendMail();
    $sendMail = new SendMailjet();
    $sendMail->forgotPasswordMail($request, $url);
    DB::commit();

    return response()->json(['status' => '200', 'message' => 'Check Your Email, We Have Send You Reset Password Link!'], 200);
  }
}
