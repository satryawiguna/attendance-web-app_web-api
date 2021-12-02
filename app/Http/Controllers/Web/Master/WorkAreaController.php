<?php

namespace App\Http\Controllers\Web\Master;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\WorkArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkAreaController extends Controller
{
  public function workAreaList()
  {
    $workArea = WorkArea::where('company_id', Auth::user()->employee->company_id)->get();
    $country = Country::all();
    $state = State::all();
    $city = City::all();
    return view('dashboard.pages.master.work_area.work_area_list', compact('workArea', 'country', 'state', 'city'));
  }

  public function workAreaCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $workArea = new WorkArea();
      $workArea->company_id = Auth::user()->employee->company_id;
      $workArea->code = $request->code;
      $workArea->title = $request->title;
      $workArea->slug = str_replace(' ', '-', strtolower($request->title));
      $workArea->country_id = $request->country_id;
      $workArea->state_id = $request->state_id;
      $workArea->city_id = $request->city_id;
      $workArea->address = $request->address;
      $workArea->postcode = $request->postcode;
      $workArea->save();

      return redirect()->back()->with('sukses', 'Create Work Area Success!');
    }
  }

  public function workAreaEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:work_units'
      ]);

      $workArea = WorkArea::where('id', $request->id)->first();
      $workArea->code = $request->code;
      $workArea->title = $request->title;
      $workArea->slug = str_replace(' ', '-', strtolower($request->title));
      $workArea->country_id = $request->country_id;
      $workArea->state_id = $request->state_id;
      $workArea->city_id = $request->city_id;
      $workArea->address = $request->address;
      $workArea->postcode = $request->postcode;
      $workArea->save();

      return redirect()->back()->with('sukses', 'Update Work Area Success!');
    }
  }

  public function workAreaDelete($id = null)
  {
    WorkArea::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Work Area Success!');
  }

  public function getState(Request $request)
  {
    if ($request->isMethod('post')) {
      $state = State::where('country_id', $request->country_id)->get();
      if ($request->from == 'create') {
        return view('dashboard.pages.master.work_area.state_list', compact('state'));
      } else {
        return $state;
      }
    }
  }

  public function getCity(Request $request)
  {
    if ($request->isMethod('post')) {
      $city = City::where('state_id', $request->state_id)->get();
      if ($request->from == 'create') {
        return view('dashboard.pages.master.work_area.city_list', compact('city'));
      } else {
        return $city;
      }
    }
  }

  public function areaList(Request $request)
  {
    if ($request->isMethod('post')) {
      $country = Country::whereHas('workArea', function ($q) use ($request) {
        $q->where('id', $request->id);
      })->first();
      $state = State::whereHas('workArea', function ($q) use ($request) {
        $q->where('id', $request->id);
      })->first();
      $city = City::whereHas('workArea', function ($q) use ($request) {
        $q->where('id', $request->id);
      })->first();
      return view('dashboard.pages.master.work_area.area_list', compact('city', 'state', 'country'));
    }
  }
}
