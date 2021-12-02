<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
  public function religionList()
  {
    $religion = Religion::all();
    return view('dashboard.pages.common.religion.religion_list', compact('religion'));
  }

  public function religionCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $religion = new Religion();
      $religion->religion_name = $request->religion_name;
      $religion->save();

      return redirect()->back()->with('sukses', 'Create Religion Success!');
    }
  }

  public function religionEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:religions'
      ]);

      $religion = Religion::where('id', $request->id)->first();
      $religion->religion_name = $request->religion_name;
      $religion->save();

      return redirect()->back()->with('sukses', 'Update Religion Success!');
    }
  }

  public function religionDelete($id = null)
  {
    Religion::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Religion Success!');
  }
}
