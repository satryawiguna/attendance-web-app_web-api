<?php

namespace App\Http\Controllers\Web\Setting;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Religion;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileSettingController extends Controller
{
  public function getProfile()
  {
    $user = Auth::user();
    return view('dashboard.pages.setting.user_profile', compact('user'));
  }

  public function updateProfile(Request $request)
  {
    $user = Auth::user();
    if ($request->isMethod('post')) {
      $request->validate([
        'email' => 'email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed',
      ]);

      DB::beginTransaction();

      if ($request->password) {
        $user->password = bcrypt($request->password);
      }
      $user->email = $request->email;
      $user->save();

      $user->userProfile->full_name = $request->full_name;
      $user->userProfile->gender = $request->gender;
      $user->userProfile->country_id = $request->country;
      $user->userProfile->state_id = $request->state;
      $user->userProfile->city_id = $request->city;
      $user->userProfile->phone = $request->phone;
      $user->userProfile->birth_date = $request->birth_date;
      $user->userProfile->address = $request->address;
      $user->userProfile->postcode = $request->postcode;
      $user->userProfile->religion_id = $request->religion;
      $user->userProfile->save();
      DB::commit();

      return redirect()->back()->with('sukses', 'Update Profile Success!');
    }
    $religion = Religion::all();
    $country = Country::all();
    $state = State::all();
    $city = City::all();
    return view('dashboard.pages.setting.user_profile_update', compact('user', 'religion', 'country', 'state', 'city'));
  }
}
