<?php

namespace App\Http\Controllers\Web\Member;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SendMail;
use App\Http\Controllers\Helper\SendMailjet;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
  public function memberList()
  {
    $memberUser = User::whereHas('userRole', function ($q) {
      $q->where('role_id', 3);
    })->where('email_verified_at', '!=', null)->get();
    return view('dashboard.pages.member.member_list', compact('memberUser'));
  }

  public function memberUpdate(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required'
      ]);

      $user = User::where('id', $request->id)->first();
      $user->status = $request->status;
      $user->save();

      if ($request->status == 'ACTIVE') {
        //send email activation
        // $sendMail = new SendMail();
        $sendMail = new SendMailjet();
        $request['email'] = $user->email;
        $sendMail->emailActivation($request);
      }

      return redirect()->back()->with('sukses', 'Success Update Member Status!');
    }
  }
}
