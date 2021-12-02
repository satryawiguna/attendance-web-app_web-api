<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
  use SoftDeletes;

  // RELATION //
  public function company()
  {
    return $this->belongsTo('App\Models\Company', 'company_id', 'id');
  }

  public function child()
  {
    return $this->hasMany('App\Models\Project', 'parent_id', 'id');
  }

  public function parent()
  {
    return $this->belongsTo('App\Models\Project', 'parent_id', 'id');
  }

  public function projectMutation()
  {
    return $this->hasMany('App\Models\ProjectMutation', 'project_id', 'id');
  }

  public function projectWorkUnit()
  {
    return $this->hasMany('App\Models\ProjectWorkUnit', 'project_id', 'id');
  }

  public function projectAddendum()
  {
    return $this->hasMany('App\Models\ProjectAddendum', 'project_id', 'id');
  }
  // END RELATION //
}
