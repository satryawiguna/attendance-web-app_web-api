<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
  use SoftDeletes;

  // RELATION //
  public function company()
  {
    return $this->belongsTo('App\Models\Company', 'company_id', 'id');
  }
  // END RELATION //
}
