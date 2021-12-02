<?php

namespace App\Http\Controllers\Web\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
  public function listPermission()
  {
    $role = Role::all();
    return view('dashboard.pages.permission.role_permission', compact('role'));
  }

  public function updatePermission(Request $request, $role_id = null)
  {
    if ($request->isMethod('post')) {
      DB::beginTransaction();
      RolePermission::where('role_id', $role_id)->delete();
      if ($request->permission_id) {
        foreach ($request->permission_id as $value) {
          $rolePermission = new RolePermission();
          $rolePermission->role_id = $role_id;
          $rolePermission->permission_id = $value;
          $rolePermission->save();
        }
      }
      DB::commit();
      return redirect()->route('role-permission-list')->with('sukses', 'Update Role Permission Success!');
    }
    $rolePermission = RolePermission::where('role_id', $role_id)->get();
    $permission_id = [];
    foreach ($rolePermission as $item) {
      array_push($permission_id, $item->permission_id);
    }
    $permission = Permission::all();
    return view('dashboard.pages.permission.role_permission_update', compact('role_id', 'permission', 'permission_id'));
  }
}
