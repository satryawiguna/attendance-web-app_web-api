<?php

namespace App\Http\Controllers\Web\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserPermissionController extends Controller
{
  public function listPermission()
  {
    if (Auth::user()->userGroup->group->slug == 'system') {
      if (Auth::user()->id == 1) {
        $user = User::all();
      } else {
        $user = User::where('id', '!=', 1)->get();
      }
    } else {
      $user = User::whereHas('employee', function ($q) {
        $q->whereHas('company', function ($q) {
          $q->where('id', Auth::user()->employee->company->id);
        });
      })->get();
    }
    return view('dashboard.pages.permission.user_permission', compact('user'));
  }

  public function updatePermission(Request $request, $user_id = null)
  {
    if ($request->isMethod('post')) {
      DB::beginTransaction();
      UserPermission::where('user_id', $user_id)->delete();
      if ($request->permission_id) {
        foreach ($request->permission_id as $value) {
          $userPermission = new UserPermission();
          $userPermission->user_id = $user_id;
          $userPermission->permission_id = $value;
          $userPermission->save();
        }
      }

      DB::commit();
      return redirect()->route('user-permission-list')->with('sukses', 'Update User Permission Success!');
    }

    $userPermission = UserPermission::where('user_id', $user_id)->get();
    $permission_id = [];

    foreach ($userPermission as $item) {
      array_push($permission_id, $item->permission_id);
    }

    $permission = Permission::whereDoesntHave('rolePermission', function ($q) use ($user_id) {
      $q->whereHas('role', function ($q) use ($user_id) {
        $q->where('id', User::where('id', $user_id)->first()->userRole->role_id);
      });
    })->where('is_restricted', 0)->get();

    return view('dashboard.pages.permission.user_permission_update', compact('user_id', 'permission', 'permission_id'));
  }
}
