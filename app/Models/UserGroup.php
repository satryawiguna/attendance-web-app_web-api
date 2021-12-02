<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGroup extends Model
{
  use SoftDeletes;
  // RELATION //
  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }

  public function group()
  {
    return $this->belongsTo('App\Models\Group', 'group_id', 'id');
  }
  // END RELATION //
}
