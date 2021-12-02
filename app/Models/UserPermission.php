<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermission extends Model
{
  // RELATION //
  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }

  public function permission()
  {
    return $this->belongsTo('App\Models\Permission', 'permission_id', 'id');
  }
  // END RELATION //
}
