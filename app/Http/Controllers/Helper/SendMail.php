<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendMail extends Controller
{
  public function forgotPasswordMail($request, $url, $email)
  {
    \Mail::send(
      'emails.content.forgot_password',
      compact('url', 'email'),
      function ($mail) use ($request) {
        $mail->from('no-reply@smartbiz.com', 'SMARTBIZ');
        $mail->to($request['email']);
        $mail->subject('Smart Attendance Reset Password');
      }
    );
  }

  public function getOtp($request, $otp)
  {
    \Mail::send(
      'emails.content.get_otp',
      compact('otp'),
      function ($mail) use ($request) {
        $mail->from('no-reply@smartbiz.com', 'SMARTBIZ');
        $mail->to($request['email']);
        $mail->subject('Kode OTP Login');
      }
    );
  }

  public function emailVerification($request, $url)
  {
    \Mail::send(
      'emails.content.email_verification',
      compact('url'),
      function ($mail) use ($request) {
        $mail->from('no-reply@smartbiz.com', 'SMARTBIZ');
        $mail->to($request['email']);
        $mail->subject('Smart Attendance Verifikasi Email');
      }
    );
  }

  public function emailActivation($request)
  {
    $url = '';
    \Mail::send(
      'emails.content.activation_account',
      compact('url'),
      function ($mail) use ($request) {
        $mail->from('no-reply@smartbiz.com', 'SMARTBIZ');
        $mail->to($request['email']);
        $mail->subject('Smart Attendance Akun telah Aktif');
      }
    );
  }

  public function emailUniqueCode($request, $code, $company, $userName)
  {
    \Mail::send(
      'emails.content.unique_code',
      compact('code', 'company', 'userName'),
      function ($mail) use ($request) {
        $mail->from('no-reply@smartbiz.com', 'SMARTBIZ');
        $mail->to($request['email']);
        $mail->subject('Smart Attendance Unique Code');
      }
    );
  }
}
