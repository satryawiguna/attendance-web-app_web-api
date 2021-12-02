<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class ProjectController extends Controller
{
  public function projectList()
  {
    $project = Project::with(['child' => function ($q) {
      $q->whereHas('projectMutation', function ($q) {
        $q->where('employee_id', Auth::user()->employee->id);
      });
    }, 'child.child' => function ($q) {
      $q->whereHas('projectMutation', function ($q) {
        $q->where('employee_id', Auth::user()->employee->id);
      });
    }, 'child.child.child' => function ($q) {
      $q->whereHas('projectMutation', function ($q) {
        $q->where('employee_id', Auth::user()->employee->id);
      });
    }, 'child.child.child.child' => function ($q) {
      $q->whereHas('projectMutation', function ($q) {
        $q->where('employee_id', Auth::user()->employee->id);
      });
    }, 'child.child.child.child.child' => function ($q) {
      $q->whereHas('projectMutation', function ($q) {
        $q->where('employee_id', Auth::user()->employee->id);
      });
    }])->whereHas('projectMutation', function ($q) {
      $q->where('employee_id', Auth::user()->employee->id);
    })->where('parent_id', '=', null)->get();
    return response()->json(['status' => '200', 'return' => $project], 200);
  }
}
