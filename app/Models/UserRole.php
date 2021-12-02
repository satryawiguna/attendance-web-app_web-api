<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
  use SoftDeletes;
  // RELATION //
  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }

  public function role()
  {
    return $this->belongsTo('App\Models\Role', 'role_id', 'id');
  }
  // END RELATION //
}
