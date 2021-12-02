<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkArea extends Model
{
  use SoftDeletes;

  // QUERY //
  // END QUERY //

  // RELATION //
  public function company()
  {
    return $this->belongsTo('App\Models\Company', 'company_id', 'id');
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
