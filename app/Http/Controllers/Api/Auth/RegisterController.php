<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SendMail;
use App\Models\EmailVerification;
use App\Models\Employee;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserRole;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
  public function getStaff(Request $request)
  {
    $request->validate([
      'unique_code' => 'required',
    ]);

    // $employee = Employee::whereHas('company', function ($q) use ($request) {
    //   $q->where('code', $request->company_code);
    // })->where('company_id', $request->id)->where('nip', $request->nip)->first();

    $employee = Employee::where('code', strtoupper($request->unique_code))->first();
    return response()->json(['status' => '200', 'return' => $employee], 200);
  }

  public function registerStaff(Request $request)
  {
    $request->validate([
      'username' => 'required|unique:users',
      'email' => 'required|email|unique:users',
      'password' => 'required|string|min:6',
      'confirm_password' => 'required|string|same:password',
      'device_id' => 'required',
      'gender' => 'required|in:MALE,FEMALE',
      'full_name' => 'required',
      'nick_name' => 'required',
      'phone' => 'required|unique:user_profiles',
      'nip' => 'required',
      'company_id' => 'required|numeric'
    ], [
      'gender.in' => 'gender value is only MALE or FEMALE'
    ]);

    $employee = Employee::where('company_id', $request->company_id)->where('nip', $request->nip)->first();

    //check available NIP
    if (!$employee) {
      return response()->json(['status' => '500', 'message' => 'Nomor NIP tidak terdaftar!'], 500);
    }

    //check registered NIP
    if ($employee['user']) {
      return response()->json(['status' => '500', 'message' => 'Nomor NIP sudah di registrasikan!'], 500);
    }

    DB::beginTransaction();
    //create user account
    $user = new User();
    $user->username = $request->username;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->device_id = $request->device_id;
    $user->created_by = $request->username;
    $user->save();

    //create user profile
    $profile = new UserProfile();
    $profile->user_id = $user->id;
    $profile->full_name = $request->full_name;
    $profile->nick_name = $request->nick_name;
    $profile->phone = $request->phone;
    $profile->gender = $request->gender;
    $profile->save();

    //create user role
    $userRole = new UserRole();
    $userRole->user_id = $user->id;
    $userRole->role_id = 6;
    $userRole->save();

    //create user group
    $userRole = new UserGroup();
    $userRole->user_id = $user->id;
    $userRole->group_id = 2;
    $userRole->save();

    //update employee relation user_id
    $employee->user_id = $user->id;
    $employee->save();

    //create and send otp
    $otp = new OtpController();
    //sms
    $resOtp = $otp->getOtpSms($user->id, $request->phone);
    //email
    // $resOtp = $otp->getOtpEmail($user->id, $request->email);
    if ($resOtp) {
      DB::commit();
      return response()->json(['status' => '200', 'message' => 'Register Success!'], 200);
    } else {
      DB::rollback();
      return response()->json(['status' => '500', 'message' => 'Register Failed! Failed to Send OTP Code!'], 500);
    }
  }
}
