<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Access extends Model
{
  use SoftDeletes;

  // RELATION //
  public function permissionAccess()
  {
    return $this->hasMany('App\Models\PermissionAccess', 'access_id', 'id');
  }
  // END RELATION //
}
