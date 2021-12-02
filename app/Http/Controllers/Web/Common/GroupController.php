<?php

namespace App\Http\Controllers\Web\Common;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
  public function groupList()
  {
    $group = Group::all();
    return view('dashboard.pages.common.group.group_list', compact('group'));
  }

  public function groupCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $group = new Group();
      $group->name = $request->name;
      $group->slug = str_replace(' ', '-', strtolower($request->name));
      $group->description = $request->description;
      $group->created_by = Auth::user()->username;
      $group->save();

      return redirect()->back()->with('sukses', 'Create Group Success!');
    }
  }

  public function groupEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:groups'
      ]);

      $group = Group::where('id', $request->id)->first();
      $group->name = $request->name;
      $group->slug = str_replace(' ', '-', strtolower($request->name));
      $group->description = $request->description;
      $group->updated_by = Auth::user()->username;
      $group->save();

      return redirect()->back()->with('sukses', 'Update Group Success!');
    }
  }

  public function groupDelete($id = null)
  {
    Group::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Group Success!');
  }
}
