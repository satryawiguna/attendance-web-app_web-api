<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
  use SoftDeletes;

  // RELATION //
  public function state()
  {
    return $this->belongsTo('App\Models\State', 'state_id', 'id');
  }

  public function userProfile()
  {
    return $this->hasMany('App\Models\UserProfile', 'city_id', 'id');
  }

  public function workArea()
  {
    return $this->hasMany('App\Models\WorkArea', 'city_id', 'id');
  }
  // END RELATION //
}
