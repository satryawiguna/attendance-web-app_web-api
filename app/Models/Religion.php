<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Religion extends Model
{
  use SoftDeletes;

  // RELATION //
  public function userProfile()
  {
    return $this->hasMany('App\Models\Comment', 'religion_id', 'id');
  }
  // END RELATION //
}
