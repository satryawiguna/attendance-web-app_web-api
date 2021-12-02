<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectAddendum extends Model
{
  use SoftDeletes;

  // RELATION //
  public function project()
  {
    return $this->belongsTo('App\Models\Project', 'project_id', 'id');
  }
  // END RELATION //
}
