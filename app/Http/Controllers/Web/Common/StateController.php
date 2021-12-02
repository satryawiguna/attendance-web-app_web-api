<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
  public function stateList()
  {
    $country = Country::all();
    $state = State::all();
    return view('dashboard.pages.common.state.state_list', compact('state', 'country'));
  }

  public function stateCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $state = new State();
      $state->country_id = $request->country;
      $state->state_name = $request->state_name;
      $state->save();

      return redirect()->back()->with('sukses', 'Create State Success!');
    }
  }

  public function stateEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:states'
      ]);

      $state = State::where('id', $request->id)->first();
      $state->country_id = $request->country;
      $state->state_name = $request->state_name;
      $state->save();

      return redirect()->back()->with('sukses', 'Update State Success!');
    }
  }

  public function stateDelete($id = null)
  {
    State::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete State Success!');
  }
}
