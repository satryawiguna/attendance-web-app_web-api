<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Permission extends Model
{
  use SoftDeletes;

  // QUERY //
  public function scopeCheckPermission($query, $route)
  {
    $query->where(function ($q) {
      $q->whereHas('rolePermission', function ($q) {
        $q->whereHas('role', function ($q) {
          $q->whereHas('userRole', function ($q) {
            $q->whereHas('user', function ($q) {
              $q->where('id', Auth::user()->id);
            });
          });
        });
      })->orWhereHas('userPermission', function ($q) {
        $q->whereHas('user', function ($q) {
          $q->where('id', Auth::user()->id);
        });
      });
    })->where('route', $route);
  }

  public function restrictedStatus()
  {
    return $this->is_restricted ? 'Yes' : 'No';
  }
  // END QUERY //

  // RELATION //
  public function userPermission()
  {
    return $this->hasMany('App\Models\UserPermission', 'permission_id', 'id');
  }

  public function userAccess()
  {
    return $this->hasMany('App\Models\UserAccess', 'permission_id', 'id');
  }

  public function rolePermission()
  {
    return $this->hasMany('App\Models\RolePermission', 'permission_id', 'id');
  }

  public function permissionAccess()
  {
    return $this->hasMany('App\Models\PermissionAccess', 'permission_id', 'id');
  }
  // END RELATION //
}
