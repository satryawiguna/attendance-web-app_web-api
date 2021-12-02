<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Home\HomeController;
use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    $request->validate([
      'username' => 'required',
      'password' => 'required',
      'device_id' => 'required',
      // 'otp' => 'required',
    ]);

    //get data user
    $user = User::login($request)->first();

    //check user
    $homeController = new HomeController();
    $checkUser = $homeController->checkUser($request->device_id, $user->id);
    if ($checkUser['status'] == '400') {
      return response()->json(['status' => '400', 'message' => $checkUser['message']], 400);
    }

    //cek credential/password
    if ($user && Hash::check($request->password, $user->password)) {

      //check otp
      // $otp = new OtpController();
      // if (!$otp->checkOtp($request->otp, $user->id)) {
      //   return response()->json(['status' => '500', 'message' => 'Kode OTP tidak sesuai atau expired!'], 500);
      // }

      //cek active account
      if ($user->status != 'ACTIVE') {
        return response()->json(['status' => '500', 'message' => 'Status Akun Anda Belum Aktif!'], 500);
      }

      //cek verify email
      if (!$user->email_verified_at) {
        return response()->json(['status' => '500', 'message' => 'Verifikasi email anda terlebih dahulu!'], 500);
      }

      //create token and refresh token
      $client = \DB::table('oauth_clients')->where('password_client', '=', true)->first();
      $data = [
        "username" => strtolower($request->username),
        "password" => $request->password,
        "grant_type" => "password",
        "client_id" => $client->id,
        "client_secret" => $client->secret
      ];
      $request = Request::create('/oauth/token', 'POST', $data);
      $response = app()->handle($request);
      $return = json_decode($response->getContent());

      //delete otp user
      Otp::where('user_id', $user->id)->delete();

      return response()->json(['status' => '200', 'data' => $return], 200);
    } else {
      return response()->json(['status' => '500', 'message' => 'Username atau Password Salah!'], 500);
    }
  }

  public function logout(Request $request)
  {
    $request->user()->token()->revoke();
    return response()->json(['status' => '200', 'message' => 'Logout Success'], 200);
  }

  public function refreshToken(Request $request)
  {
    $request->validate([
      'refresh_token' => 'required'
    ]);

    //create token and refresh token
    $client = \DB::table('oauth_clients')->where('password_client', '=', true)->first();
    $data = [
      "refresh_token" => $request->refresh_token,
      "grant_type" => "refresh_token",
      "client_id" => $client->id,
      "client_secret" => $client->secret
    ];
    $request = Request::create('/oauth/token', 'POST', $data);
    $response = app()->handle($request);
    $return = json_decode($response->getContent());

    return response()->json(['status' => '200', 'data' => $return], 200);
  }
}
