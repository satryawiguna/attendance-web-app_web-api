<?php

namespace App\Http\Controllers\Web\Master;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
  public function positionList()
  {
    $position = Position::where('company_id', Auth::user()->employee->company_id)->get();
    return view('dashboard.pages.master.position.position_list', compact('position'));
  }

  public function positionCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $position = new Position();
      $position->parent_id = $request->parent_id;
      $position->company_id = Auth::user()->employee->company_id;
      $position->name = $request->name;
      $position->slug = str_replace(' ', '-', strtolower($request->name));
      $position->created_by = Auth::user()->username;
      $position->save();

      return redirect()->back()->with('sukses', 'Create Position Success!');
    }
  }

  public function positionEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:work_units'
      ]);

      $position = Position::where('id', $request->id)->first();
      $position->parent_id = $request->parent_id;
      $position->name = $request->name;
      $position->slug = str_replace(' ', '-', strtolower($request->name));
      $position->modified_by = Auth::user()->username;
      $position->save();

      return redirect()->back()->with('sukses', 'Update Position Success!');
    }
  }

  public function positionDelete($id = null)
  {
    Position::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Position Success!');
  }
}
