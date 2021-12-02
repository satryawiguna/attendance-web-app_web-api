<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\UploadImage;
use App\Models\User;
use App\Models\UserProfile;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function profileGet()
  {
    $query = User::where('id', Auth::user()->id)->first();
    $user = new UserResource($query);
    return response()->json(['status' => '200', 'return' => $user], 200);
  }

  public function profileUpdate(Request $request)
  {
    $profile = UserProfile::where('user_id', Auth::user()->id)->first();
    $request->validate([
      'password' => 'nullable|string|min:6',
      'confirm_password' => 'nullable|string|same:password',
      'gender' => 'required|in:MALE,FEMALE',
      'full_name' => 'required',
      'nick_name' => 'required',
      'phone' => 'required|unique:user_profiles,phone,' . $profile->id,
      'country_id' => 'nullable|exists:countries,id',
      'state_id' => 'nullable|exists:states,id',
      'city_id' => 'nullable|exists:cities,id',
      'religion_id' => 'nullable|exists:religions,id',
      'birth_date' => 'nullable|date',
      'photo_profile' => 'nullable|image',
    ], [
      'gender.in' => 'gender value is only MALE or FEMALE'
    ]);

    $photo_profile = null;
    if ($request->photo_profile) {
      $photoProfile = new UploadImage();
      $photo_profile = $photoProfile->uploadImage($request->photo_profile, 'img/photo_profile/');
    }

    $profile->gender = $request->gender;
    $profile->full_name = $request->full_name;
    $profile->nick_name = $request->nick_name;
    $profile->phone = $request->phone;
    $profile->country_id = $request->country_id;
    $profile->state_id = $request->state_id;
    $profile->city_id = $request->city_id;
    $profile->address = $request->address;
    $profile->postcode = $request->postcode;
    $profile->religion_id = $request->religion_id;
    $profile->birth_date = date("Y-m-d", strtotime($request->birth_date));
    $profile->photo_profile = $photo_profile;
    $profile->save();

    if ($request->has('password')) {
      $profile->user->password = bcrypt($request->password);
      $profile->user->save();
    }

    return response()->json(['status' => '200', 'message' => 'success update profile!'], 200);
  }
}
