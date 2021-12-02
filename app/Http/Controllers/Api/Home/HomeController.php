<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function deviceIdUpdate(Request $request)
  {
    $request->validate([
      'device_id' => 'required'
    ]);

    User::where('id', Auth::user()->id)->update([
      'device_id' => $request->device_id
    ]);

    return response()->json(['status' => '200', 'message' => 'update device id success!'], 200);
  }

  public function checkUser($device_id, $user_id)
  {
    $user = User::where('id', $user_id)->first();

    if (!$user->employee) {
      return ['status' => '400', 'message' => 'user employee has been deleted!'];
    }

    if (!$user->device_id) {
      $user->device_id = $device_id;
      $user->save();
      return ['status' => '200', 'message' => 'your device id successfully updated!'];
    }

    if ($user->device_id != $device_id) {
      return ['status' => '400', 'message' => 'device id is different! please do request reset your device id to admin!'];
    }

    return ['status' => '200', 'message' => 'you are logged in as employee!'];
  }
}
