<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeatureSettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{
  public function getFeatureSetting()
  {
    $user =  Auth::user();
    $query = Setting::where('company_id', $user->employee->company_id)->where('active_status', 1)->get();
    $setting = FeatureSettingResource::collection($query);

    return response()->json(['status' => '200', 'data' => $setting], 200);
  }
}
