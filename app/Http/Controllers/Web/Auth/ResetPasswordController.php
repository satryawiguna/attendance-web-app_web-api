<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SendMail;
use App\Http\Controllers\Helper\SendMailjet;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
  public function forgotPassword(Request $request)
  {
    if ($request->isMethod('post')) {
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

      return redirect()->back()->with('sukses', 'Check Your Email, We Have Send You Reset Password Link!');
    }
    return view('dashboard.pages.forgot_password');
  }

  public function resetPassword(Request $request, $token = null)
  {
    $resetToken = PasswordReset::where('token', $token)->first();
    if ($request->isMethod('post')) {
      $request->validate([
        'password' => 'required|min:6',
        'password_confirm' => 'required|same:password'
      ]);

      DB::beginTransaction();
      User::where('email', $resetToken->email)->update([
        'password' => bcrypt($request->password)
      ]);

      $resetToken->token = bin2hex(random_bytes(16));
      $resetToken->save();
      DB::commit();

      return redirect()->route('login')->with('sukses', 'Reset Password Successfully!');
    }
    if ($resetToken) {
      return view('dashboard.pages.reset_password', compact('token'));
    } else {
      return redirect()->route('forgot-password')->with('gagal', 'Reset Password URL is Invalid!');
    }
  }
}
