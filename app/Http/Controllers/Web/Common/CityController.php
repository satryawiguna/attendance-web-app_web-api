<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
  public function cityList()
  {
    $city = City::all();
    $state = State::all();
    return view('dashboard.pages.common.city.city_list', compact('city', 'state'));
  }

  public function cityCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $city = new City();
      $city->state_id = $request->state;
      $city->city_name = $request->city_name;
      $city->save();

      return redirect()->back()->with('sukses', 'Create City Success!');
    }
  }

  public function cityEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:cities'
      ]);

      $city = City::where('id', $request->id)->first();
      $city->state_id = $request->state;
      $city->city_name = $request->city_name;
      $city->save();

      return redirect()->back()->with('sukses', 'Update City Success!');
    }
  }

  public function cityDelete($id = null)
  {
    City::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete City Success!');
  }
}
