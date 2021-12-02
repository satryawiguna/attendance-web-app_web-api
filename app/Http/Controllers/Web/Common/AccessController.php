<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Permission;
use App\Models\PermissionAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
{
  public function accessList()
  {
    $access = Access::all();
    $permission = Permission::all();
    return view('dashboard.pages.common.access.access_list', compact('access', 'permission'));
  }

  public function getRolePermission($access_id = null)
  {
    $permissionAccess = PermissionAccess::where('access_id', $access_id)->get();
    $permission_id = [];
    foreach ($permissionAccess as $item) {
      array_push($permission_id, $item->permission_id);
    }
    $permission = Permission::all();
    return view('dashboard.pages.common.access.access_permission', compact('permission', 'permission_id'));
  }

  public function accessCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      DB::beginTransaction();
      $access = new Access();
      $access->name = $request->name;
      $access->slug = str_replace(' ', '-', strtolower($request->name));
      $access->description = $request->description;
      $access->created_by = Auth::user()->username;
      $access->save();

      foreach ($request->permission_id as $value) {
        $permissionAccess = new PermissionAccess();
        $permissionAccess->access_id = $access->id;
        $permissionAccess->permission_id = $value;
        $permissionAccess->save();
      }
      DB::commit();

      return redirect()->back()->with('sukses', 'Create Access Success!');
    }
  }

  public function accessEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:accesses'
      ]);

      DB::beginTransaction();
      $access = Access::where('id', $request->id)->first();
      $access->name = $request->name;
      $access->slug = str_replace(' ', '-', strtolower($request->name));
      $access->description = $request->description;
      $access->modified_by = Auth::user()->username;
      $access->save();

      PermissionAccess::where('access_id', $request->id)->delete();
      foreach ($request->permission_id as $value) {
        $permissionAccess = new PermissionAccess();
        $permissionAccess->access_id = $request->id;
        $permissionAccess->permission_id = $value;
        $permissionAccess->save();
      }
      DB::commit();

      return redirect()->back()->with('sukses', 'Update Access Success!');
    }
  }

  public function accessDelete($id = null)
  {
    Access::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Access Success!');
  }
}
