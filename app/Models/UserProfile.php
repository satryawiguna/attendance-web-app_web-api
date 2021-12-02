<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
  use SoftDeletes;
  // RELATION //
  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }

  public function religion()
  {
    return $this->belongsTo('App\Models\Religion', 'religion_id', 'id');
  }

  public function country()
  {
    return $this->belongsTo('App\Models\Country', 'country_id', 'id');
  }

  public function state()
  {
    return $this->belongsTo('App\Models\State', 'state_id', 'id');
  }

  public function city()
  {
    return $this->belongsTo('App\Models\City', 'city_id', 'id');
  }
  // END RELATION //
}
