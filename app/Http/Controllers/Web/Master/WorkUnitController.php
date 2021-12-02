<?php

namespace App\Http\Controllers\Web\Master;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\WorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkUnitController extends Controller
{
  public function workUnitList()
  {
    $workUnit = WorkUnit::where('company_id', Auth::user()->employee->company_id)->get();
    return view('dashboard.pages.master.work_unit.work_unit_list', compact('workUnit'));
  }

  public function workUnitCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $workUnit = new WorkUnit();
      $workUnit->parent_id = $request->parent_id;
      $workUnit->company_id = Auth::user()->employee->company_id;
      $workUnit->name = $request->name;
      $workUnit->slug = str_replace(' ', '-', strtolower($request->name));
      $workUnit->created_by = Auth::user()->username;
      $workUnit->save();

      return redirect()->back()->with('sukses', 'Create Work Unit Success!');
    }
  }

  public function workUnitEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:work_units'
      ]);

      $workUnit = WorkUnit::where('id', $request->id)->first();
      $workUnit->parent_id = $request->parent_id;
      $workUnit->name = $request->name;
      $workUnit->slug = str_replace(' ', '-', strtolower($request->name));
      $workUnit->modified_by = Auth::user()->username;
      $workUnit->save();

      return redirect()->back()->with('sukses', 'Update Work Unit Success!');
    }
  }

  public function workUnitDelete($id = null)
  {
    WorkUnit::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Work Unit Success!');
  }
}
