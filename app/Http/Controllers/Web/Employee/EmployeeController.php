<?php

namespace App\Http\Controllers\Web\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SendMail;
use App\Http\Controllers\Helper\SendMailjet;
use App\Http\Controllers\Helper\SmsViro;
use App\Models\Employee;
use App\Models\Office;
use App\Models\Position;
use App\Models\Project;
use App\Models\ProjectMutation;
use App\Models\Religion;
use App\Models\Role;
use App\Models\WorkArea;
use App\Models\WorkUnit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
  public function listEmployee()
  {
    $user = Auth::user();
    $employee = Employee::where('company_id', $user->employee->company_id)->paginate(15);
    $work_unit = WorkUnit::where('company_id', $user->employee->company_id)->get();
    $position = Position::where('company_id', $user->employee->company_id)->get();
    $work_area = WorkArea::where('company_id', $user->employee->company_id)->get();
    $office = Office::where('company_id', $user->employee->company_id)->get();
    $religion = Religion::all();
    $role = Role::where('group_id', 2)->get();
    return view('dashboard.pages.employee.employee_list', compact('employee', 'work_unit', 'position', 'work_area', 'office', 'religion', 'role'));
  }

  public function createEmployee(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        // 'nip' => Rule::unique('employees')->where('nip', $request->nip)->where('company_id', Auth::user()->employee->company_id),
        'birth_date' => 'required|date|before_or_equal:' . date('d-m-Y'),
        'nik' => 'required|unique:employees',
        'email' => 'required|unique:employees',
      ]);

      $checkEmployee = Employee::where('nip', $request->nip)->where('company_id', Auth::user()->employee->company_id)->first();
      if ($checkEmployee) {
        return redirect()->back()->with('gagal', 'The nip has already been taken');
      }

      $employeeCode = strtoupper(bin2hex(openssl_random_pseudo_bytes(3)));

      $employee = new Employee();
      $employee->full_name = $request->full_name;
      $employee->code = $employeeCode;
      $employee->nick_name = $request->nick_name;
      $employee->nip = $request->nip;
      $employee->nik = $request->nik;
      $employee->company_id = Auth::user()->employee->company_id;
      $employee->work_unit_id = $request->work_unit_id;
      $employee->office_id = $request->office_id;
      $employee->work_area_id = $request->work_area_id;
      $employee->position_id = $request->position_id;
      $employee->religion_id = $request->religion_id;
      $employee->gender = $request->gender;
      $employee->birth_place = $request->birth_place;
      $employee->birth_date = $request->birth_date;
      $employee->phone = $request->phone;
      $employee->email = $request->email;
      $employee->address = $request->address;
      $employee->created_by = Auth::user()->username;
      $employee->save();

      //send email unique code to employee
      // $sendMail = new SendMail();
      $sendMail = new SendMailjet();
      $sendMail->emailUniqueCode($request, $employeeCode, $employee->company->name, $request->full_name);

      //send sms unique code to employee
      $text = "Hi, " . $request->full_name . ". \nAnda telah terdaftar sebagai employee dari perusahaan " . $employee->company->name . ", masukkan kode unik dibawah ini saat melakukan registrasi di aplikasi smart attendance. \n\n" . $employeeCode;
      $sms = new SmsViro();
      $sms->sendSms($text, $request->phone);

      return redirect()->back()->with('sukses', 'Create Employee Success!');
    }
  }

  public function updateEmployee(Request $request)
  {
    $request->validate([
      'id' => 'required|exists:employees'
    ]);

    DB::beginTransaction();
    $employee = Employee::where('id', $request->id)->first();
    $request->validate([
      'route' => Rule::unique('employees')->where('nip', $request->nip)->where('company_id', Auth::user()->employee->company_id)->ignore($employee->id)
    ]);

    if (isset($employee->user['userRole'])) {
      if ((($employee->user->userRole->role_id == 3) && ($request->role_id != 3)) || (($employee->user->userRole->role_id != 3) && ($request->role_id == 3))) {
        return redirect()->back()->with('gagal', 'Role Admin only one user!');
      }

      $employee->user->userRole->role_id = $request->role_id;
      $employee->user->userRole->save();
    }

    $employee->full_name = $request->full_name;
    $employee->nick_name = $request->nick_name;
    $employee->nip = $request->nip;
    $employee->nik = $request->nik;
    $employee->company_id = Auth::user()->employee->company_id;
    $employee->work_unit_id = $request->work_unit_id;
    $employee->office_id = $request->office_id;
    $employee->work_area_id = $request->work_area_id;
    $employee->position_id = $request->position_id;
    $employee->religion_id = $request->religion_id;
    $employee->gender = $request->gender;
    $employee->birth_place = $request->birth_place;
    $employee->birth_date = $request->birth_date;
    $employee->phone = $request->phone;
    $employee->email = $request->email;
    $employee->address = $request->address;
    $employee->status = $request->status;
    $employee->updated_by = Auth::user()->username;
    $employee->save();
    DB::commit();

    return redirect()->back()->with('sukses', 'Update Employee Success!');
  }

  public function deleteEmployee($id)
  {
    Employee::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Employee Success!');
  }

  public function searchEmployee(Request $request)
  {
    $user = Auth::user();
    $employee = Employee::where('company_id', $user->employee->company_id)->get();
    $work_unit = WorkUnit::where('company_id', $user->employee->company_id)->get();
    $position = Position::where('company_id', $user->employee->company_id)->get();
    $work_area = WorkArea::where('company_id', $user->employee->company_id)->get();
    $office = Office::where('company_id', $user->employee->company_id)->get();
    $religion = Religion::all();
    $role = Role::where('group_id', 2)->get();

    if ($request->isMethod('post')) {
      $query = Employee::when($request->full_name_search, function ($q) use ($request) {
        // return $q->where('full_name', 'like', '%' . $request->full_name_search . '%');
        return $q->whereRaw('LOWER(`full_name`) LIKE ? ', ['%' . strtolower($request->full_name_search) . '%']);
      })->when($request->nip_search, function ($q) use ($request) {
        return $q->where('nip', 'like', '%' . $request->nip_search . '%');
      })->when($request->office_id_search, function ($q) use ($request) {
        return $q->where('office_id', 'like', '%' . $request->office_id_search . '%');
      })->when($request->phone_search, function ($q) use ($request) {
        return $q->where('phone', 'like', '%' . $request->phone_search . '%');
      })->when($request->email_search, function ($q) use ($request) {
        return $q->where('email', 'like', '%' . $request->email_search . '%');
      });

      $employee = $query->where('company_id', $user->employee->company_id)->paginate($request->per_page)->appends(request()->all());
      session()->flashInput($request->all());
      return view('dashboard.pages.employee.employee_list', compact('employee', 'work_unit', 'position', 'work_area', 'office', 'religion', 'role'));
    }

    //get search pagination
    $query = Employee::when($request->has('full_name_search'), function ($q) use ($request) {
      // return $q->where('full_name', 'like', '%' . $request->full_name . '%');
      return $q->whereRaw('LOWER(`full_name`) LIKE ? ', ['%' . strtolower($request->full_name_search) . '%']);
    })->when($request->has('nip_search'), function ($q) use ($request) {
      return $q->where('nip', 'like', '%' . $request->nip_search . '%');
    })->when($request->has('office_id_search'), function ($q) use ($request) {
      return $q->where('office_id', 'like', '%' . $request->office_id_search . '%');
    })->when($request->has('phone_search'), function ($q) use ($request) {
      return $q->where('phone', 'like', '%' . $request->phone_search . '%');
    })->when($request->has('email_search'), function ($q) use ($request) {
      return $q->where('email', 'like', '%' . $request->email_search . '%');
    });

    $employee = $query->where('company_id', $user->employee->company_id)->paginate($request->per_page)->appends(request()->all());
    session()->flashInput($request->all());
    return view('dashboard.pages.employee.employee_list', compact('employee', 'work_unit', 'position', 'work_area', 'office', 'religion', 'role'));
  }

  public function listEmployeeMutation()
  {
    $user = Auth::user();
    $employee = Employee::where('company_id', $user->employee->company_id)->paginate(15);
    $work_unit = WorkUnit::where('company_id', $user->employee->company_id)->get();
    $position = Position::where('company_id', $user->employee->company_id)->get();
    $work_area = WorkArea::where('company_id', $user->employee->company_id)->get();
    $office = Office::where('company_id', $user->employee->company_id)->get();
    $religion = Religion::all();
    return view('dashboard.pages.employee.employee_mutation', compact('employee'));
  }

  public function updateEmployeeMutation(Request $request, $employee_id = null)
  {
    if ($request->isMethod('post')) {
      DB::beginTransaction();
      $projectMutation = new ProjectMutation();
      $projectMutation->employee_id = $employee_id;
      $projectMutation->project_id = $request->project_id;
      $projectMutation->mutation_date = $request->mutation_date;
      $projectMutation->save();
      DB::commit();
      return redirect()->back()->with('sukses', 'Add Project Mutation Success!');
    }

    $projectMutation = ProjectMutation::where('employee_id', $employee_id)->get();
    $project = Project::where('company_id', Auth::user()->employee->company_id)->get();
    return view('dashboard.pages.employee.employee_mutation_update', compact('project', 'projectMutation', 'employee_id'));
  }

  public function projectUpdateMutation(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'id' => 'required'
      ]);

      $projectMutation = ProjectMutation::where('id', $request->id)->first();
      $projectMutation->project_id = $request->project_id;
      $projectMutation->mutation_date = $request->mutation_date;
      $projectMutation->save();
      return redirect()->back()->with('sukses', 'Update Project Mutation Success!');
    }
  }

  public function deleteProjectMutation($id = null)
  {
    ProjectMutation::where('id', $id)->delete();
    return redirect()->back()->with('sukses', 'Delete Project Mutation Success!');
  }

  public function resetDeviceId($id = null)
  {
    $user = User::whereHas('employee', function ($q) use ($id) {
      $q->where('id', $id);
    })->first();
    $user->device_id = null;
    $user->save();

    return redirect()->back()->with('sukses', 'Reset Device Id Success!');
  }

  public function getQrcode($nip = null)
  {
    return view('pages.nip_qrcode', compact('nip'));
  }

  // public function updateEmployeeMutation(Request $request, $employee_id = null)
  // {
  //   if ($request->isMethod('post')) {
  //     DB::beginTransaction();
  //     ProjectMutation::where('employee_id', $employee_id)->delete();
  //     if ($request->project_id) {
  //       foreach ($request->project_id as $value) {
  //         $projectMutation = new ProjectMutation();
  //         $projectMutation->project_id = $value;
  //         $projectMutation->employee_id = $employee_id;
  //         $projectMutation->save();
  //       }
  //     }
  //     DB::commit();
  //     return redirect()->route('project-mutation-list')->with('sukses', 'Update Project Mutation Success!');
  //   }

  //   $projectMutation = ProjectMutation::where('employee_id', $employee_id)->get();
  //   $project_id = [];
  //   foreach ($projectMutation as $value) {
  //     array_push($project_id, $value->project_id);
  //   }
  //   $project = Project::where('company_id', Auth::user()->employee->company_id)->get();
  //   return view('dashboard.pages.employee.employee_mutation_update', compact('employee_id', 'project', 'project_id'));
  // }
}
