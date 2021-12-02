<?php

namespace App\Http\Controllers\Web\Master;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
  public function officeList()
  {
    $office = Office::where('company_id', Auth::user()->employee['company_id'])->get();
    return view('dashboard.pages.master.office.office_list', compact('office'));
  }

  public function officeCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $office = new Office();
      $office->company_id = Auth::user()->employee['company_id'];
      $office->name = $request->name;
      $office->slug = str_replace(' ', '-', strtolower($request->name));
      $office->longitude = $request->longitude;
      $office->latitude = $request->latitude;
      $office->save();

      return redirect()->back()->with('sukses', 'Create Office Success!');
    }
  }

  public function officeEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:offices'
      ]);

      $office = Office::where('id', $request->id)->first();
      $office->name = $request->name;
      $office->slug = str_replace(' ', '-', strtolower($request->name));
      $office->longitude = $request->longitude;
      $office->latitude = $request->latitude;
      $office->save();

      return redirect()->back()->with('sukses', 'Update Office Success!');
    }
  }

  public function officeDelete($id = null)
  {
    Office::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Office Success!');
  }
}
