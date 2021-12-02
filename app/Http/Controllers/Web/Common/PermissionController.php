<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
  public function permissionList()
  {
    $permission = Permission::all();
    return view('dashboard.pages.common.permission.permission_list', compact('permission'));
  }

  public function getRole(Request $request)
  {
    if ($request->isMethod('post')) {
      if ($request->group_id == 1) {
        $role = Role::whereHas('group', function ($q) {
          $q->where('id', 1);
        })->get();
      } else {
        $role = Role::all();
      }
      return view('dashboard.pages.common.permission.permission_role', compact('role'));
    }
  }

  public function permissionCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'route' => Rule::unique('permissions')->where('route', $request->route)->where('route_type', $request->route_type)
      ]);

      DB::beginTransaction();
      $permission = new Permission();
      $permission->name = $request->name;
      $permission->slug = str_replace(' ', '-', strtolower($request->name));
      $permission->route = $request->route;
      $permission->route_type = $request->route_type;
      $permission->url = $request->url;
      $permission->is_restricted = $request->is_restricted;
      $permission->description = $request->description;
      $permission->created_by = Auth::user()->username;
      $permission->save();

      foreach ($request->role_id as $value) {
        $rolePermission = new RolePermission();
        $rolePermission->role_id = $value;
        $rolePermission->permission_id = $permission->id;
        $rolePermission->save();
      }
      DB::commit();

      return redirect()->back()->with('sukses', 'Create Permission Success!');
    }
  }

  public function permissionEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:permissions'
      ]);

      $permission = Permission::where('id', $request->id)->first();

      $request->validate([
        'route' => Rule::unique('permissions')->where('route', $request->route)->where('route_type', $request->route_type)->ignore($permission->id)
      ]);

      $permission->name = $request->name;
      $permission->slug = str_replace(' ', '-', strtolower($request->name));
      $permission->route = $request->route;
      $permission->route_type = $request->route_type;
      $permission->url = $request->url;
      $permission->is_restricted = $request->is_restricted;
      $permission->description = $request->description;
      $permission->updated_by = Auth::user()->username;
      $permission->save();

      return redirect()->back()->with('sukses', 'Update Permission Success!');
    }
  }

  public function permissionDelete($id = null)
  {
    Permission::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Permission Success!');
  }
}
