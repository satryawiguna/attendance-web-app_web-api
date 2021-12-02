<?php

namespace App\Http\Controllers\Web\Project;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Project;
use App\Models\ProjectAddendum;
use App\Models\ProjectMutation;
use App\Models\ProjectWorkUnit;
use App\Models\WorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
  public function projectList()
  {
    $user = Auth::user();
    $project = Project::where('company_id', $user->employee->company_id)->get();
    return view('dashboard.pages.project.project_list', compact('project'));
  }

  public function projectCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'start_date' => 'required|date|after_or_equal:' . date('d-m-Y'),
        'end_date' => 'required|date|after:start_date',
      ]);

      $project = new Project();
      $project->parent_id = $request->parent_id;
      $project->reference_number = $request->reference_number;
      $project->company_id = Auth::user()->employee->company_id;
      $project->name = $request->name;
      $project->slug = str_replace(' ', '-', strtolower($request->name));
      $project->start_date = $request->start_date;
      $project->end_date = $request->end_date;
      $project->created_by = Auth::user()->username;
      $project->longitude = $request->longitude;
      $project->latitude = $request->latitude;
      $project->save();

      return redirect()->back()->with('sukses', 'Create Project Success!');
    }
  }

  public function projectUpdate(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:projects',
        'start_date' => 'required|date|after_or_equal:' . date('d-m-Y'),
        'end_date' => 'required|date|after:start_date',
      ]);

      $project = Project::where('id', $request->id)->first();
      $project->parent_id = $request->parent_id;
      $project->reference_number = $request->reference_number;
      $project->name = $request->name;
      $project->slug = str_replace(' ', '-', strtolower($request->name));
      $project->start_date = $request->start_date;
      $project->end_date = $request->end_date;
      $project->modified_by = Auth::user()->username;
      $project->longitude = $request->longitude;
      $project->latitude = $request->latitude;
      $project->save();

      return redirect()->back()->with('sukses', 'Update Project Success!');
    }
  }

  public function projectDelete($id)
  {
    Project::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Project Success!');
  }

  public function listProjectMutation()
  {
    $user = Auth::user();
    $project = Project::where('company_id', $user->employee->company_id)->get();
    return view('dashboard.pages.project.project_mutation', compact('project'));
  }

  public function updateProjectMutation(Request $request, $project_id = null)
  {
    if ($request->isMethod('post')) {
      DB::beginTransaction();
      ProjectMutation::where('project_id', $project_id)->delete();
      if ($request->employee_id) {
        foreach ($request->employee_id as $value) {
          $projectMutation = new ProjectMutation();
          $projectMutation->project_id = $project_id;
          $projectMutation->employee_id = $value;
          $projectMutation->save();
        }
      }
      DB::commit();
      return redirect()->route('project-mutation-list')->with('sukses', 'Update Project Mutation Success!');
    }

    $projectMutation = ProjectMutation::where('project_id', $project_id)->get();
    $employee_id = [];
    foreach ($projectMutation as $value) {
      array_push($employee_id, $value->employee_id);
    }
    $employee = Employee::where('company_id', Auth::user()->employee->company_id)->get();
    return view('dashboard.pages.project.project_mutation_update', compact('project_id', 'employee', 'employee_id'));
  }

  public function listProjectWorkUnit()
  {
    $user = Auth::user();
    $project = Project::where('company_id', $user->employee->company_id)->get();
    return view('dashboard.pages.project.project_work_unit', compact('project'));
  }

  public function updateProjectWorkUnit(Request $request, $project_id = null)
  {
    if ($request->isMethod('post')) {
      DB::beginTransaction();
      ProjectWorkUnit::where('project_id', $project_id)->delete();
      if ($request->work_unit_id) {
        foreach ($request->work_unit_id as $value) {
          $projectWorkUnit = new ProjectWorkUnit();
          $projectWorkUnit->project_id = $project_id;
          $projectWorkUnit->work_unit_id = $value;
          $projectWorkUnit->save();
        }
      }
      DB::commit();
      return redirect()->route('project-list')->with('sukses', 'Update Project Work Unit Success!');
    }

    $projectWorkUnit = ProjectWorkUnit::where('project_id', $project_id)->get();
    $work_unit_id = [];
    foreach ($projectWorkUnit as $value) {
      array_push($work_unit_id, $value->work_unit_id);
    }
    $workUnit = WorkUnit::where('company_id', Auth::user()->employee->company_id)->get();
    return view('dashboard.pages.project.project_work_unit_update', compact('project_id', 'workUnit', 'work_unit_id'));
  }

  public function projectAddendumList()
  {
    $projectAddendum = ProjectAddendum::whereHas('project', function ($q) {
      $q->where('company_id', Auth::user()->employee->company_id);
    })->get();
    $project = Project::where('company_id', Auth::user()->employee->company_id)->get();

    return view('dashboard.pages.project.project_addendum_list', compact('projectAddendum', 'project'));
  }

  public function projectAddendumCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'start_date' => 'required|date|after_or_equal:' . date('d-m-Y'),
        'end_date' => 'required|date|after:start_date',
      ]);

      $projectAddendum = new ProjectAddendum();
      $projectAddendum->project_id = $request->project_id;
      $projectAddendum->reference_number = $request->reference_number;
      $projectAddendum->name = $request->name;
      $projectAddendum->start_date = $request->start_date;
      $projectAddendum->end_date = $request->end_date;
      $projectAddendum->description = $request->description;
      $projectAddendum->save();

      return redirect()->back()->with('sukses', 'Create Project Addendum Success!');
    }
  }

  public function projectAddendumUpdate(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required|exists:projects',
        'start_date' => 'required|date|after_or_equal:' . date('d-m-Y'),
        'end_date' => 'required|date|after:start_date',
      ]);

      $projectAddendum = ProjectAddendum::where('id', $request->id)->first();
      $projectAddendum->project_id = $request->project_id;
      $projectAddendum->reference_number = $request->reference_number;
      $projectAddendum->name = $request->name;
      $projectAddendum->start_date = $request->start_date;
      $projectAddendum->end_date = $request->end_date;
      $projectAddendum->description = $request->description;
      $projectAddendum->save();

      return redirect()->back()->with('sukses', 'Update Project Addendum Success!');
    }
  }

  public function projectAddendumDelete($id = null)
  {
    ProjectAddendum::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Project Success!');
  }
}
