<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
  use SoftDeletes;

  // QUERY //
  public function getStatus()
  {
    switch ($this->status) {
      case 1:
        return 'Active';
        break;
      case 0:
        return 'Non Active';
        break;
      case -1:
        return 'Blacklist';
        break;
      case -2:
        return 'Out';
        break;
      default:
        return 'No Status';
        break;
    }
  }

  public function registerStatus()
  {
    if ($this->user_id) {
      return 'Registered';
    } else {
      return 'Not Registered Yet';
    }
  }
  // END QUERY //

  // RELATION //
  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }

  public function company()
  {
    return $this->belongsTo('App\Models\Company', 'company_id', 'id');
  }

  public function workUnit()
  {
    return $this->belongsTo('App\Models\WorkUnit', 'work_unit_id', 'id');
  }

  public function position()
  {
    return $this->belongsTo('App\Models\Position', 'position_id', 'id');
  }

  public function absent()
  {
    return $this->hasMany('App\Models\Absent', 'employee_id', 'id');
  }

  public function religion()
  {
    return $this->belongsTo('App\Models\Religion', 'religion_id', 'id');
  }

  public function workArea()
  {
    return $this->belongsTo('App\Models\WorkArea', 'work_area_id', 'id');
  }

  public function office()
  {
    return $this->belongsTo('App\Models\Office', 'office_id', 'id');
  }
  // END RELATION //
}
