<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsentCategoryDetail extends Model
{
  // RELATION //
  public function absentCategory()
  {
    return $this->belongsTo('App\Models\AbsentCategory', 'absent_category_id', 'id');
  }
  // RELATION //
}
