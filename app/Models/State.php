<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
  use SoftDeletes;
  // RELATION //
  public function country()
  {
    return $this->belongsTo('App\Models\Country', 'country_id', 'id');
  }

  public function city()
  {
    return $this->hasMany('App\Models\City', 'state_id', 'id');
  }

  public function userProfile()
  {
    return $this->hasMany('App\Models\UserProfile', 'state_id', 'id');
  }

  public function workArea()
  {
    return $this->hasMany('App\Models\WorkArea', 'state_id', 'id');
  }
  // END RELATION //
}
