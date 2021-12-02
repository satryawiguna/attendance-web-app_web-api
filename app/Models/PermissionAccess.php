<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionAccess extends Model
{
  use SoftDeletes;

  // RELATION //
  public function permission()
  {
    return $this->belongsTo('App\Models\Permission', 'permission_id', 'id');
  }

  public function access()
  {
    return $this->belongsTo('App\Models\Access', 'access_id', 'id');
  }
  // END RELATION //
}
