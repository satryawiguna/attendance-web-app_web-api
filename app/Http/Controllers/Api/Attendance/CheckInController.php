<?php

namespace App\Http\Controllers\Api\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Absent;
use App\Models\AbsentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CheckInController extends Controller
{
  public function doCheckIn(Request $request)
  {
    $request->validate([
      'type' => 'nullable|in:present,absent',
      'longitude' => 'nullable',
      'latitude' => 'nullable',
      'temperature' => 'nullable',
      'attachment' => 'nullable',
      'absent_category_id' => 'nullable|exists:absent_categories,id',
      'project_id' => 'nullable|exists:projects,id',
    ]);

    $absent = Absent::where('employee_id', Auth::user()->employee->id)->where('status', 0)->where('date', date('Y-m-d'))->first();
    if ($absent) {
      return response()->json(['status' => '400', 'message' => 'You still have on going attendance or already submit attendance today!'], 400);
    }

    //check type and category
    if (!$request->type && !$request->absent_category_id) {
      return response()->json(['status' => '400', 'message' => 'both type or category, both of these can not be null'], 400);
    }

    //check attachment
    $path = null;
    if ($request->hasFile('attachment')) {
      //save attachment
      $file = $request->attachment;
      $extension = $file->getClientOriginalExtension();
      $filename = rand(111, 99999) . date('Ymdhis') . '.' . $extension;
      $url = 'attendance/attachment/';
      $path = $url . $filename;
      Storage::disk('local_storage')->put($path, file_get_contents($file));
    }

    //get type
    if ($request->absent_category_id) {
      $absentCategory = AbsentCategory::where('id', $request->absent_category_id)->first();
      $type = $absentCategory->type;
    } else {
      $type = $request->type;
    }

    //insert check in attendance
    $absent = new Absent();
    $absent->employee_id = Auth::user()->employee->id;
    $absent->absent_category_id = $request->absent_category_id;
    $absent->project_id = $request->project_id;
    $absent->date = date('Y-m-d');
    $absent->time_start = date('H:i:s');
    $absent->longitude = $request->longitude;
    $absent->latitude = $request->latitude;
    $absent->temperature = $request->temperature;
    $absent->attachment = $path;
    $absent->type = $type;
    $absent->status = $type == 'present' ? 0 : -1;
    $absent->created_by = Auth::user()->username;
    $absent->save();
    return response()->json(['status' => '200', 'message' => 'Check In Success!'], 200);
  }
}
