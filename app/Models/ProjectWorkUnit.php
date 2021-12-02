<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectWorkUnit extends Model
{
  use SoftDeletes;

  // RELATION //
  public function project()
  {
    return $this->belongsTo('App\Models\Project', 'project_id', 'id');
  }

  public function workUnit()
  {
    return $this->belongsTo('App\Models\WorkUnit', 'work_unit_id', 'id');
  }
  // END RELATION //
}
