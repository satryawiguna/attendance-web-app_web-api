<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SendMail;
use App\Http\Controllers\Helper\SendMailjet;
use App\Models\AbsentCategory;
use App\Models\Company;
use App\Models\EmailVerification;
use App\Models\Employee;
use App\Models\Religion;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
  public function register(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'email' => 'required|unique:users',
        'nik' => 'required|unique:employees',
        'username' => 'required|unique:users',
        'password' => 'required|string|min:6',
        'confirm_password' => 'required|string|same:password',
      ]);

      DB::beginTransaction();
      $user = new User();
      $user->email = $request->email;
      $user->username = $request->username;
      $user->password = bcrypt($request->password);
      $user->device_id = 'empty';
      $user->save();

      $userRole = new UserRole();
      $userRole->user_id = $user->id;
      $userRole->role_id = 3;
      $userRole->save();

      $userGroup = new UserGroup();
      $userGroup->user_id = $user->id;
      $userGroup->group_id = 2;
      $userGroup->save();

      $company = new Company();
      $company->name = $request->company_name;
      $company->save();

      $employee = new Employee();
      $employee->user_id = $user->id;
      $employee->code = strtoupper(bin2hex(openssl_random_pseudo_bytes(3)));
      $employee->company_id = $company->id;
      $employee->full_name = $request->full_name;
      $employee->nick_name = $request->nick_name;
      $employee->nik = $request->nik;
      // $employee->gender = $request->gender;
      // $employee->religion_id = $request->religion_id;
      // $employee->birth_place = $request->birth_place;
      // $employee->birth_date = $request->birth_date;
      // $employee->address = $request->address;
      $employee->phone = $request->phone;
      $employee->email = $request->email;
      $employee->nip = 1;
      $employee->save();

      $absentCategory = new AbsentCategory();
      $absentCategory->company_id = $company->id;
      $absentCategory->name = 'Reguler';
      $absentCategory->type = 'present';
      $absentCategory->save();

      //create token for email verification
      $token = bin2hex(random_bytes(16));
      $emailVerif = new EmailVerification();
      $emailVerif->user_id = $user->id;
      $emailVerif->token = $token;
      $emailVerif->save();

      //send email verification
      $url = env('SMARTATTENDANCE_URL', 'https://app.attendance.smartbiz.id/') . 'email-verification/' . $token;
      // $sendMail = new SendMail();
      $sendMail = new SendMailjet();
      $sendMail->emailVerification($request, $url);
      DB::commit();

      // return redirect()->back()->with('sukses', 'Registration Success! Please Check Your Email to Verify your Account!');
      return view('pages.register_success');
    }

    $religion = Religion::all();
    return view('dashboard.pages.register', compact('religion'));
  }
}
