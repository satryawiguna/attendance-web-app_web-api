<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absent extends Model
{
  use SoftDeletes;

  // QUERY //
  public function getStatus()
  {
    switch ($this->status) {
      case 0:
        return "Present Check In";
        break;
      case 1:
        return "Present Check Out";
        break;
      case -1:
        return "Absent";
        break;
      default:
        return "Invalid Status";
        break;
    }
  }
  // END QUERY //

  // RELATION //
  public function employee()
  {
    return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
  }

  public function absentCategory()
  {
    return $this->belongsTo('App\Models\AbsentCategory', 'absent_category_id', 'id');
  }
  // END RELATION //
}
