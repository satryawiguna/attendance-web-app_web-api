<?php

namespace App\Http\Controllers\Web\Setting;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureSettingController extends Controller
{
  public function getFeature(Request $request)
  {
    if ($request->isMethod('post')) {
      $setting = Setting::where('company_id', Auth::user()->employee->company->id)->where('feature_id', $request->id)->first();
      if ($setting) {
        $setting->min_value = $request->min_value;
        $setting->max_value = $request->max_value;
        $setting->active_status = $request->active_status;
        $setting->save();
      } else {
        $setting = new Setting();
        $setting->feature_id = $request->id;
        $setting->company_id = Auth::user()->employee->company->id;
        $setting->min_value = $request->min_value;
        $setting->max_value = $request->max_value;
        $setting->active_status = $request->active_status;
        $setting->save();
      }

      return redirect()->back()->with('sukses', 'Feature Setting Successfully Updated!');
    }

    $feature = Feature::all();
    return view('dashboard.pages.setting.feature_setting', compact('feature'));
  }
}
