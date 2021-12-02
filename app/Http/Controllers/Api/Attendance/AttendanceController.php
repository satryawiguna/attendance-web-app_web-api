<?php

namespace App\Http\Controllers\Api\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Absent;
use App\Models\AbsentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
  public function attendanceSummary(Request $request)
  {
    $request->validate([
      'date_from' => 'required|date',
      'date_to' => 'required|date|after:date_from',
    ]);

    // $query = Absent::where('employee_id', Auth::user()->employee->id)->whereDate('date', '>=', $request->date_from)->whereDate('date', '<=', $request->date_to);
    $total_attendance = Absent::where('employee_id', Auth::user()->employee->id)->whereDate('date', '>=', $request->date_from)->whereDate('date', '<=', $request->date_to)->count();
    $total_present = Absent::where('employee_id', Auth::user()->employee->id)->whereDate('date', '>=', $request->date_from)->whereDate('date', '<=', $request->date_to)->where('type', 'present')->count();
    $total_absent = Absent::where('employee_id', Auth::user()->employee->id)->whereDate('date', '>=', $request->date_from)->whereDate('date', '<=', $request->date_to)->where('type', 'absent')->count();

    if ($total_attendance > 0) {
      $data['present_percentage'] = ($total_present / $total_attendance) * 100;
      $data['absent_percentage'] = ($total_absent / $total_attendance) * 100;
    } else {
      $data['present_percentage'] = 0;
      $data['absent_percentage'] = 0;
    }

    $data['total_attendance'] = $total_attendance;

    return response()->json(['status' => '200', 'return' => $data], 200);
  }

  public function attendanceCurrent()
  {
    $absent = Absent::whereHas('employee', function ($q) {
      $q->whereHas('user', function ($q) {
        $q->where('id', Auth::user()->id);
      });
    })->with('absentCategory')->where('date', date('Y-m-d'))->first();
    return response()->json(['status' => '200', 'return' => $absent], 200);
  }

  public function attendanceCategory()
  {
    $absentCategory = AbsentCategory::where('company_id', Auth::user()->employee->company_id)->get();
    return response()->json(['status' => '200', 'return' => $absentCategory], 200);
  }
}
