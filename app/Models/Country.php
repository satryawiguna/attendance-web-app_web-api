<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
  use SoftDeletes;

  // RELATION //
  public function state()
  {
    return $this->hasMany('App\Models\State', 'country_id', 'id');
  }

  public function userProfile()
  {
    return $this->hasMany('App\Models\UserProfile', 'country_id', 'id');
  }

  public function workArea()
  {
    return $this->hasMany('App\Models\WorkArea', 'country_id', 'id');
  }
  // END RELATION //
}
