<?php

namespace App\Http\Controllers\Api\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Absent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
  public function doCheckOut(Request $request)
  {
    $request->validate([
      'date' => 'required|date'
    ]);

    $absent = Absent::where('employee_id', Auth::user()->employee->id)->where('date', $request->date)->where('status', 0)->first();
    if ($absent) {
      $absent->time_end = date('H:i:s');
      $absent->status = 1;
      $absent->save();
      return response()->json(['status' => '200', 'message' => 'Check Out Success!'], 200);
    } else {
      return response()->json(['status' => '400', 'message' => 'Data Attendance Not Found!'], 400);
    }
  }
}
