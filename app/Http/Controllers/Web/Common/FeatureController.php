<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{
  public function featureList()
  {
    $feature = Feature::all();
    return view('dashboard.pages.common.feature.feature_list', compact('feature'));
  }

  public function featureCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $feature = new Feature();
      $feature->feature_name = $request->feature_name;
      $feature->is_active = $request->is_active;
      $feature->save();

      return redirect()->back()->with('sukses', 'Create Feature Success!');
    }
  }

  public function featureEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:features'
      ]);

      $feature = Feature::where('id', $request->id)->first();
      $feature->feature_name = $request->feature_name;
      $feature->is_active = $request->is_active;
      $feature->save();

      return redirect()->back()->with('sukses', 'Update Feature Success!');
    }
  }

  public function featureDelete($id = null)
  {
    Feature::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Feature Success!');
  }
}
