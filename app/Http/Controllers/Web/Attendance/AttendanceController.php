<?php

namespace App\Http\Controllers\Web\Attendance;

use App\Http\Controllers\Controller;
use App\Models\AbsentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
  public function attendanceCategoryList(Request $request)
  {
    $attendanceCategory = AbsentCategory::where('company_id', Auth::user()->employee->company_id)->get();
    return view('dashboard.pages.attendance.attendance_category', compact('attendanceCategory'));
  }

  public function attendanceCategoryCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $attendanceCategory = new AbsentCategory();
      $attendanceCategory->company_id = Auth::user()->employee->company_id;
      $attendanceCategory->name = $request->name;
      $attendanceCategory->type = $request->type;
      $attendanceCategory->is_validate = $request->is_validate;
      $attendanceCategory->time_start = $request->time_start;
      $attendanceCategory->time_end = $request->time_end;
      $attendanceCategory->time_tolerance = $request->time_tolerance;
      $attendanceCategory->save();

      return redirect()->back()->with('sukses', 'Create Attendance Category Success!');
    }
  }

  public function attendanceCategoryEdit(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:absent_categories'
      ]);

      $attendanceCategory = AbsentCategory::where('id', $request->id)->first();
      $attendanceCategory->name = $request->name;
      $attendanceCategory->type = $request->type;
      $attendanceCategory->is_validate = $request->is_validate;
      $attendanceCategory->time_start = $request->time_start;
      $attendanceCategory->time_end = $request->time_end;
      $attendanceCategory->time_tolerance = $request->time_tolerance;
      $attendanceCategory->save();

      return redirect()->back()->with('sukses', 'Update Attendance Category Success!');
    }
  }

  public function attendanceCategoryDelete($id = null)
  {
    AbsentCategory::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Attendance Category Success!');
  }

  public function attendanceReport(Request $request)
  {
    //$absent
  }
}
