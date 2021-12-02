<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Feature extends Model
{
  use SoftDeletes;

  // QUERY //
  public function getActive()
  {
    if ($this->is_active) {
      return 'Active';
    } else {
      return 'Non Active';
    }
  }

  public function getSetting()
  {
    $setting = Setting::whereHas('feature', function ($q) {
      $q->where('feature_id', $this->id);
    })->where('company_id', Auth::user()->employee->company->id)->first();

    if ($setting) {
      $setting['setting_status'] = $setting->active_status == 1 ? 'Active' : 'Non Active';
    } else {
      $setting = null;
    }
    return $setting;
  }
  // END QUERY //

  // RELATION //
  public function setting()
  {
    return $this->hasMany('App\Models\Setting', 'feature_id', 'id');
  }
  // END RELATION //
}
