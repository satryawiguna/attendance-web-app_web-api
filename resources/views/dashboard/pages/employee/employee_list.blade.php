@extends('dashboard.layouts.master')
@section('custom_css')
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    @if (Route::currentRouteName() == 'employee-search')
      <a href="{{route('employee-list')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Employee List
      </a>    
    @else
      <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add Employee
      </button>
    @endif
  </div>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
        {{$error}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    @endforeach
  @endif
  @if (Session::has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"> 
      {{Session::get('sukses')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  @endif
  @if (Session::has('gagal'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
      {{Session::get('gagal')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  @endif

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="mb-3 font-weight-bold text-primary">Employee Search</h6>
      <form action="{{route('employee-search')}}" method="post">
        {{ csrf_field() }}

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <select name="per_page" class="form-control" required>
                <option value="15">15 Data/Page</option>
                <option value="25">25 Data/Page</option>
                <option value="50">50 Data/Page</option>
                <option value="100">100 Data/Page</option>
              </select>
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="full_name_search" placeholder="input employee full name" value="{{old('full_name_search')}}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input class="form-control" type="number" name="nip_search" placeholder="input employee nip" value="{{old('nip_search')}}">
            </div>
            <div class="form-group">
              <select name="office_id_search" class="form-control">
                <option value="" selected hidden disabled>List Office!</option>
                @foreach ($office as $item)
                  <option value="{{$item->id}}" {{old('office_id_search') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>    
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input class="form-control" type="number" name="phone_search" placeholder="input employee phone" value="{{old('phone_search')}}">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="email_search" placeholder="input employee email" value="{{old('email_search')}}">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm py-1 px-3 ml-3" title="search employee"><i class="fas fa-search"></i> Search</button>
        </div>
      </form>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>NIP (employee number)</th>
              <th>Register Status</th>
              <th>Role User</th>
              <th>NIP QrCode</th>
              <th>Unique Code</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employee as $item)
              <tr>
                <td>{{$item->full_name}}</td>
                <td>{{$item->nip}}</td>
                <td>{{$item->registerStatus()}}</td>
                <td>{{isset($item->user['userRole']) ? $item->user->userRole->role->name : 'Not Registered Yet'}}</td>
                <td><a target="_blank" href="{{route('employee-qrcode', ['nip' => $item->nip])}}">Open QrCode</a></td>
                <td>{{$item->code}}</td>
                <td style="text-align: center; width: 20%">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-full_name="{{$item->full_name}}"
                  data-nick_name="{{$item->nick_name}}"
                  data-nip="{{$item->nip}}"
                  data-nik="{{$item->nik}}"
                  data-status="{{$item->status}}"
                  data-work_unit_id="{{$item->work_unit_id}}"
                  data-office_id="{{$item->office_id}}"
                  data-work_area_id="{{$item->work_area_id}}"
                  data-position_id="{{$item->position_id}}"
                  data-religion_id="{{$item->religion_id}}"
                  data-gender="{{$item->gender}}"
                  data-birth_place="{{$item->birth_place}}"
                  data-birth_date="{{$item->birth_date}}"
                  data-phone="{{$item->phone}}"
                  data-email="{{$item->email}}"
                  data-address="{{$item->address}}"
                  data-role_id="{{isset($item->user['userRole']) ? $item->user->userRole->role_id : '0'}}"
                  >
                    <i class="fas fa-edit"></i>
                  </button>
                  @if ($item->registerStatus() == 'Registered' && isset($item->user->device_id))
                    <a href="{{route('employee-reset-device-id', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to reset this device id?')" title="Reset Device Id"><i class="fas fa-eraser"></i></a>
                  @endif
                  <a href="{{route('employee-delete', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to delete this?')" title="Delete Data"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $employee->links() }}
    </div>
  </div>

  <!-- Modal Create-->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="{{route('employee-create')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control" type="text" name="full_name" placeholder="input employee full name" required>
            </div>
            
            <div class="form-group">
              <label class="control-label">Nick Name</label>
              <input class="form-control" type="text" name="nick_name" placeholder="input employee nick name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Birth Place</label>
              <input class="form-control" type="text" name="birth_place" placeholder="input employee birth place" required>
            </div>

            <div class="form-group">
              <label class="control-label">Birth Date</label>
              <input class="form-control" type="date" name="birth_date" placeholder="input employee birth date" required>
            </div>

            <div class="form-group">
              <label class="control-label">Employee Number (NIP)</label>
              <input class="form-control" type="number" name="nip" placeholder="input employee number" required>
            </div>

            <div class="form-group">
              <label class="control-label">Identity Number (NIK)</label>
              <input class="form-control" type="number" name="nik" placeholder="input employee identity number" required>
            </div>

            <div class="form-group">
              <label class="control-label">Gender</label>
              <select name="gender" class="form-control">
                <option value="" selected hidden disabled>Choose Gender!</option>
                <option value="MALE">Male</option>
                <option value="FEMALE">Female</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Religion</label>
              <select name="religion_id" class="form-control">
                <option value="" selected hidden disabled>Choose Religion!</option>
                @foreach ($religion as $item)
                  <option value="{{$item->id}}">{{$item->religion_name}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Department</label>
              <select name="work_unit_id" class="form-control">
                <option value="" selected hidden disabled>Choose Department!</option>
                @foreach ($work_unit as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Location</label>
              <select name="work_area_id" class="form-control">
                <option value="" selected hidden disabled>Choose Location!</option>
                @foreach ($work_area as $item)
                  <option value="{{$item->id}}">{{$item->title}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Office</label>
              <select name="office_id" class="form-control">
                <option value="" selected hidden disabled>Choose Office!</option>
                @foreach ($office as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Position</label>
              <select name="position_id" class="form-control">
                <option value="" selected hidden disabled>Choose Position!</option>
                @foreach ($position as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Phone</label>
              <input class="form-control" type="number" name="phone" placeholder="input phone number" required>
            </div>

            <div class="form-group">
              <label class="control-label">Email</label>
              <input class="form-control" type="text" name="email" placeholder="input email" required>
            </div>

            <div class="form-group">
              <label class="control-label">Address</label>
              <textarea class="form-control" placeholder="input address" name="address" required></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Edit-->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="{{route('employee-update')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">
            
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control" type="text" name="full_name" id="full_name" placeholder="input office name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Nick Name</label>
              <input class="form-control" type="text" name="nick_name" id="nick_name" placeholder="input office name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Birth Place</label>
              <input class="form-control" type="text" name="birth_place" id="birth_place" placeholder="input employee birth place" required>
            </div>

            <div class="form-group">
              <label class="control-label">Birth Date</label>
              <input class="form-control" type="date" name="birth_date" id="birth_date" placeholder="input employee birth date" required>
            </div>

            <div class="form-group">
              <label class="control-label">Employee Number (NIP)</label>
              <input class="form-control" type="number" name="nip" id="nip" placeholder="input employee number" required>
            </div>

            <div class="form-group">
              <label class="control-label">Identity Number (NIK)</label>
              <input class="form-control" type="number" name="nik" id="nik" placeholder="input employee number" required>
            </div>

            <div class="form-group">
              <label class="control-label">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="" selected hidden disabled>Choose Gender!</option>
                <option value="MALE">Male</option>
                <option value="FEMALE">Female</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Religion</label>
              <select name="religion_id" id="religion_id" class="form-control">
                <option value="" selected hidden disabled>Choose Religion!</option>
                @foreach ($religion as $item)
                  <option value="{{$item->id}}">{{$item->religion_name}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Department</label>
              <select name="work_unit_id" id="work_unit_id" class="form-control">
                <option value="" selected hidden disabled>Choose Department!</option>
                @foreach ($work_unit as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Location</label>
              <select name="work_area_id" id="work_area_id" class="form-control">
                <option value="" selected hidden disabled>Choose Location!</option>
                @foreach ($work_area as $item)
                  <option value="{{$item->id}}">{{$item->title}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Office</label>
              <select name="office_id" id="office_id" class="form-control">
                <option value="" selected hidden disabled>Choose Office!</option>
                @foreach ($office as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Position</label>
              <select name="position_id" id="position_id" class="form-control">
                <option value="" selected hidden disabled>Choose Position!</option>
                @foreach ($position as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Phone</label>
              <input class="form-control" type="number" name="phone" id="phone" placeholder="input phone number" required>
            </div>

            <div class="form-group">
              <label class="control-label">Email</label>
              <input class="form-control" type="text" name="email" id="email" placeholder="input email" required>
            </div>

            <div class="form-group">
              <label class="control-label">Address</label>
              <textarea class="form-control" placeholder="input address" name="address" id="address" required></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Role User</label>
              <select name="role_id" id="role_id" class="form-control">
                <option value="" selected hidden disabled>Choose Role!</option>
                @foreach ($role as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>    
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="" selected hidden disabled>Choose Status!</option>
                <option value="1">Active</option>
                <option value="0">Non Active</option>
                <option value="-1">Blacklist</option>
                <option value="-2">Out</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
@section('custom_js')
<script>
  if (window.history.replaceState) {
    window.history.replaceState( null, null, window.location.href )
  }

  $(document).ready(function() {
    // $('#dataTable').DataTable();
  });

  $('#modalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    modal.find('#id').val(button.data('id'))
    modal.find('#full_name').val(button.data('full_name'))
    modal.find('#nick_name').val(button.data('nick_name'))
    modal.find('#nip').val(button.data('nip'))
    modal.find('#nik').val(button.data('nik'))
    modal.find('#status').val(button.data('status'))
    modal.find('#work_unit_id').val(button.data('work_unit_id'))
    modal.find('#office_id').val(button.data('office_id'))
    modal.find('#work_area_id').val(button.data('work_area_id'))
    modal.find('#position_id').val(button.data('position_id'))
    modal.find('#religion_id').val(button.data('religion_id'))
    modal.find('#gender').val(button.data('gender'))
    modal.find('#birth_place').val(button.data('birth_place'))
    modal.find('#birth_date').val(button.data('birth_date'))
    modal.find('#phone').val(button.data('phone'))
    modal.find('#email').val(button.data('email'))
    modal.find('#address').val(button.data('address'))
    modal.find('#role_id').val(button.data('role_id'))
  })
</script>
@endsection