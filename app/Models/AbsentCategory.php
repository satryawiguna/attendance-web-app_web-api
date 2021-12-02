<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsentCategory extends Model
{
  // QUERY //
  public function getValidateStatus()
  {
    return $this->is_validate == 0 ? 'No' : 'Yes';
  }
  // END QUERY //

  // RELATION //
  public function company()
  {
    return $this->belongsTo('App\Models\Company', 'company_id', 'id');
  }

  public function absentCategoryDetail()
  {
    return $this->hasMany('App\Models\AbsentCategoryDetail', 'absent_category_id', 'id');
  }
  // END RELATION //
}
