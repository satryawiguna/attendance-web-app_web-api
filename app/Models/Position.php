<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
  use SoftDeletes;

  // RELATION //
  public function employee()
  {
    return $this->hasOne('App\Models\Employee', 'position_id', 'id');
  }

  public function company()
  {
    return $this->belongsTo('App\Models\Company', 'company_id', 'id');
  }

  public function parent()
  {
    return $this->belongsTo('App\Models\Position', 'parent_id', 'id');
  }
  // END RELATION //
}
