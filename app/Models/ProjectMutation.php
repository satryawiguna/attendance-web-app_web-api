<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectMutation extends Model
{
  use SoftDeletes;

  // RELATION //
  public function employee()
  {
    return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
  }

  public function project()
  {
    return $this->belongsTo('App\Models\Project', 'project_id', 'id');
  }
  // END RELATION //
}
