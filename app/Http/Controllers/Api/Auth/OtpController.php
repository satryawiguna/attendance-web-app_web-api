<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SendMail;
use App\Http\Controllers\Helper\SmsViro;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OtpController extends Controller
{
  public function getOtp(Request $request)
  {
    $request->validate([
      'email' => 'exists:users|required|email'
    ]);

    $otpCode = rand(111111, 999999);
    $user = User::where('email', $request->email)->first();

    DB::beginTransaction();
    Otp::updateOrCreate(
      //condition
      ['user_id' => $user->id],
      //value
      ['otp' => $otpCode, 'created_at' => date('Y-m-d h:i:s')]
    );

    $sendMail = new SendMail();
    $sendMail->getOtp($request, $otpCode);
    DB::commit();

    return response()->json(['status' => '200', 'message' => 'Check Your Email, We Have Send You Otp Code!'], 200);
  }

  public function getOtpSms($user_id, $phone)
  {
    $otpCode = rand(111111, 999999);
    $text = "SMARTBIZ OTP! : \n" . $otpCode . "\nJangan diberikan kepada siapapun!";

    DB::beginTransaction();
    Otp::updateOrCreate(
      //condition
      ['user_id' => $user_id],
      //value
      ['otp' => $otpCode, 'created_at' => date('Y-m-d h:i:s')]
    );

    //send sms viro
    $sms = new SmsViro();
    $sendOtp = $sms->sendSms($text, $phone)['messages'][0]['status']['groupName'];

    if ($sendOtp == 'PENDING') {
      DB::commit();
      return true;
    } else {
      return false;
    }
  }

  public function getOtpEmail($user_id, $email)
  {
    $otpCode = rand(111111, 999999);
    $request['email'] = $email;

    DB::beginTransaction();
    Otp::updateOrCreate(
      //condition
      ['user_id' => $user_id],
      //value
      ['otp' => $otpCode, 'created_at' => date('Y-m-d h:i:s')]
    );

    try {
      //send email
      $sendMail = new SendMail();
      $sendMail->getOtp($request, $otpCode);
      DB::commit();
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function submitOtp(Request $request)
  {
    $request->validate([
      'otp' => 'required',
      'email' => 'required'
    ]);

    $otp = Otp::whereHas('user', function ($q) use ($request) {
      $q->where('email', $request->email);
    })->where('otp', $request->otp)->first();

    if ($otp) {
      $diff = strtotime(date('Y-m-d h:i:s')) - strtotime($otp->created_at);
      if ($diff <= 3600) {
        $otp->user->email_verified_at = date('Y-m-d h:i:s');
        $otp->user->status = 'ACTIVE';
        $otp->user->save();

        return response()->json(['status' => '200', 'message' => 'Kode OTP success to verified!'], 200);
      } else {
        return response()->json(['status' => '500', 'message' => 'Kode OTP expired!'], 500);
      }
    } else {
      return response()->json(['status' => '500', 'message' => 'Kode OTP tidak sesuai!'], 500);
    }
  }

  public function checkOtp($otp, $user_id)
  {
    $otp = Otp::where('otp', $otp)->where('user_id', $user_id)->first();
    if ($otp) {
      $diff = strtotime(date('Y-m-d h:i:s')) - strtotime($otp->created_at);
      return $diff <= 90 ? true : false;
    } else {
      return false;
    }
  }
}
