<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkUnit extends Model
{
  use SoftDeletes;

  // QUERY //

  // END QUERY //

  // RELATION //
  public function employee()
  {
    return $this->hasMany('App\Models\Employee', 'work_unit_id', 'id');
  }

  public function company()
  {
    return $this->belongsTo('App\Models\Company', 'company_id', 'id');
  }

  public function projectWorkUnit()
  {
    return $this->hasMany('App\Models\ProjectWorkUnit', 'work_unit_id', 'id');
  }

  public function parent()
  {
    return $this->belongsTo('App\Models\WorkUnit', 'parent_id', 'id');
  }
  // END RELATION //
}
