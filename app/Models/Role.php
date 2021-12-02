<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
  use SoftDeletes;
  // RELATION //
  public function userRole()
  {
    return $this->hasMany('App\Models\UserRole', 'role_id', 'id');
  }

  public function group()
  {
    return $this->belongsTo('App\Models\Group', 'group_id', 'id');
  }

  public function rolePermission()
  {
    return $this->hasMany('App\Models\RolePermission', 'role_id', 'id');
  }
  // END RELATION //
}
