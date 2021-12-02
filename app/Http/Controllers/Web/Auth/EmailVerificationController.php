<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SendMail;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailVerificationController extends Controller
{
  public function userEmailVerification($token = null)
  {
    $emailVerif = EmailVerification::where('token', $token)->where('is_used', 0)->first();

    if ($emailVerif) {
      DB::beginTransaction();
      $emailVerif->is_used = 1;
      $emailVerif->save();

      $emailVerif->user->email_verified_at = date('Y-m-d h:i:s');
      $emailVerif->user->status = $emailVerif->user->userRole->role_id == 3 ? 'PENDING' : 'ACTIVE';
      $emailVerif->user->save();
      DB::commit();
      return view('pages.email_verified');
    } else {
      return 'token verifikasi email tidak valid';
    }
  }

  public function resendEmailVerification(Request $request)
  {
    $request->validate([
      'email' => 'required|exists:users'
    ]);

    $user = User::where('email', $request->email)->where('email_verified_at', null)->first();

    if (!$user) {
      return redirect()->back()->with('gagal', 'Akun tidak ditemukan atau sudah terverifikasi!');
    }

    //send email verification
    $url = env('SMARTATTENDANCE_URL') . 'email-verification/' . $user->emailVerification->token;
    $sendMail = new SendMail();
    $sendMail->emailVerification($request, $url);

    return redirect()->back()->with('sukses', 'Sukses Mengirim Verifikasi Email!');
  }
}
