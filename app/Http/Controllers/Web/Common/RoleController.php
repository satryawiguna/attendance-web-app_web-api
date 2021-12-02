<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
  public function roleList()
  {
    $group = Group::all();
    $role = Role::all();
    $permission = Permission::all();
    return view('dashboard.pages.common.role.role_list', compact('role', 'group', 'permission'));
  }

  public function getRolePermission($role_id = null)
  {
    $rolePermission = RolePermission::where('role_id', $role_id)->get();
    $permission_id = [];
    foreach ($rolePermission as $item) {
      array_push($permission_id, $item->permission_id);
    }
    $permission = Permission::all();
    return view('dashboard.pages.common.role.role_permission', compact('permission', 'permission_id'));
  }

  public function roleCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      DB::beginTransaction();
      $role = new Role();
      $role->group_id = $request->group_id;
      $role->name = $request->name;
      $role->slug = str_replace(' ', '-', strtolower($request->name));
      $role->description = $request->description;
      $role->created_by = Auth::user()->username;
      $role->save();

      foreach ($request->permission_id as $value) {
        $rolePermission = new RolePermission();
        $rolePermission->role_id = $role->id;
        $rolePermission->permission_id = $value;
        $rolePermission->save();
      }
      DB::commit();

      return redirect()->back()->with('sukses', 'Create Role Success!');
    }
  }

  public function roleEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:roles'
      ]);

      DB::beginTransaction();
      $role = Role::where('id', $request->id)->first();
      $role->group_id = $request->group_id;
      $role->name = $request->name;
      $role->slug = str_replace(' ', '-', strtolower($request->name));
      $role->description = $request->description;
      $role->updated_by = Auth::user()->username;
      $role->save();

      RolePermission::where('role_id', $request->id)->delete();
      foreach ($request->permission_id as $value) {
        $rolePermission = new RolePermission();
        $rolePermission->role_id = $request->id;
        $rolePermission->permission_id = $value;
        $rolePermission->save();
      }
      DB::commit();

      return redirect()->back()->with('sukses', 'Update Role Success!');
    }
  }

  public function roleDelete($id = null)
  {
    Role::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Role Success!');
  }
}
