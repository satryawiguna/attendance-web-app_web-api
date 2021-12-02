<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
  use SoftDeletes;

  // QUERY //
  public function getActiveStatus()
  {
    if ($this->active_status) {
      return 'Active';
    } else {
      return 'Non Active';
    }
  }
  // END QUERY //

  // RELATION //
  public function company()
  {
    return $this->belongsTo('App\Models\Company', 'company_id', 'id');
  }

  public function feature()
  {
    return $this->belongsTo('App\Models\Feature', 'feature_id', 'id');
  }
  // END RELATION //
}
