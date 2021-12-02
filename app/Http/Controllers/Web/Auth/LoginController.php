<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'username' => 'required',
        'password' => 'required'
      ]);

      $user = User::login($request)->first();
      if ($user && Hash::check($request->password, $user->password)) {
        //cek verify email
        if (!$user->email_verified_at) {
          return redirect()->back()->with('gagal', 'Verifikasi email anda terlebih dahulu!')->withInput();
        }

        //cek active account
        if ($user->status != 'ACTIVE') {
          return redirect()->back()->with('gagal', 'Status Akun Anda Belum Aktif!')->withInput();
        }

        Auth::guard('web')->login($user);
        return redirect()->route('home');
      } else {
        return redirect()->back()->with('gagal', 'Username atau Password Salah!')->withInput();
      }
    }
    return view('dashboard.pages.login');
  }

  public function logout()
  {
    Auth::guard('web')->logout();
    return redirect()->route('login');
  }
}
