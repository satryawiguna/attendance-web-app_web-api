<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
  use SoftDeletes;

  // RELATION //
  public function userGroup()
  {
    return $this->hasMany('App\Models\UserGroup', 'group_id', 'id');
  }

  public function role()
  {
    return $this->hasMany('App\Models\Role', 'group_id', 'id');
  }
  // END RELATION //
}
