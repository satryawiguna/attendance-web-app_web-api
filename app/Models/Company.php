<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
  use SoftDeletes;

  // RELATION //
  public function employee()
  {
    return $this->hasMany('App\Models\Employee', 'company_id', 'id');
  }

  public function position()
  {
    return $this->hasMany('App\Models\Position', 'company_id', 'id');
  }

  public function office()
  {
    return $this->hasMany('App\Models\Office', 'company_id', 'id');
  }

  public function project()
  {
    return $this->hasMany('App\Models\Project', 'company_id', 'id');
  }

  public function workUnit()
  {
    return $this->hasMany('App\Models\WorkUnit', 'company_id', 'id');
  }

  public function setting()
  {
    return $this->hasMany('App\Models\Setting', 'company_id', 'id');
  }

  public function workArea()
  {
    return $this->hasMany('App\Models\WorkArea', 'company_id', 'id');
  }

  public function absentCategory()
  {
    return $this->hasMany('App\Models\AbsentCategory', 'company_id', 'id');
  }
  // END RELATION //
}
