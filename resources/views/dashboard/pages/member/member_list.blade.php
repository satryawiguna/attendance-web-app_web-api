@extends('dashboard.layouts.master')
@section('custom_css')
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    {{-- <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter">
      <i class="fas fa-plus fa-sm text-white-50"></i> Add Employee
    </button> --}}
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
  <div class="card shadow">
    <div class="card-header">
      <h6 class="font-weight-bold text-primary">Member Company List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>Member Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Verified Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($memberUser as $item)
              <tr>
                <td>{{$item->employee->company->name}}</td>
                <td>{{$item->employee->full_name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->employee->phone}}</td>
                <td>{{ucfirst(strtolower($item->status))}}</td>
                <td style="text-align: center;">
                  <button type="button" title="Detail Member Data" class="btn btn-primary px-3" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-full_name="{{$item->employee->full_name}}"
                  data-nick_name="{{$item->employee->nick_name}}"
                  data-nik="{{$item->employee->nik}}"
                  data-gender="{{$item->employee->gender}}"
                  data-religion_id="{{isset($item->employee['religion']) ? $item->employee->religion->religion_name : ''}}"
                  data-birth_place="{{$item->employee->birth_place}}"
                  data-birth_date="{{$item->employee->birth_date}}"
                  data-phone="{{$item->employee->phone}}"
                  data-email="{{$item->employee->email}}"
                  data-address="{{$item->employee->address}}"
                  data-status="{{$item->status}}"
                  >
                    <i class="fas fa-info"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Edit-->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="{{route('member-company-update')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Detail Member Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">
            
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control" type="text" name="full_name" id="full_name" disabled>
            </div>

            <div class="form-group">
              <label class="control-label">Nick Name</label>
              <input class="form-control" type="text" name="nick_name" id="nick_name" disabled>
            </div>

            <div class="form-group">
              <label class="control-label">Birth Place</label>
              <input class="form-control" type="text" name="birth_place" id="birth_place" disabled>
            </div>

            <div class="form-group">
              <label class="control-label">Birth Date</label>
              <input class="form-control" type="date" name="birth_date" id="birth_date" disabled>
            </div>

            <div class="form-group">
              <label class="control-label">Identity Number (NIK)</label>
              <input class="form-control" type="number" name="nik" id="nik" disabled>
            </div>

            <div class="form-group">
              <label class="control-label">Gender</label>
              <input class="form-control" type="gender" name="gender" id="gender" disabled>
            </div>

            <div class="form-group">
              <label class="control-label">Phone</label>
              <input class="form-control" type="number" name="phone" id="phone" disabled>
            </div>

            <div class="form-group">
              <label class="control-label">Email</label>
              <input class="form-control" type="text" name="email" id="email" disabled>
            </div>

            <div class="form-group">
              <label class="control-label">Address</label>
              <textarea class="form-control" name="address" id="address" disabled></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="" selected hidden disabled>Choose Status!</option>
                <option value="ACTIVE">Active</option>
                <option value="PENDING">Pending</option>
                <option value="DISABLE">Disable</option>
                <option value="BLOCK">Block</option>
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
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });

  $('#modalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    modal.find('#id').val(button.data('id'))
    modal.find('#full_name').val(button.data('full_name'))
    modal.find('#nick_name').val(button.data('nick_name'))
    modal.find('#nik').val(button.data('nik'))
    modal.find('#religion_id').val(button.data('religion_id'))
    modal.find('#gender').val(button.data('gender'))
    modal.find('#birth_place').val(button.data('birth_place'))
    modal.find('#birth_date').val(button.data('birth_date'))
    modal.find('#phone').val(button.data('phone'))
    modal.find('#email').val(button.data('email'))
    modal.find('#address').val(button.data('address'))
    modal.find('#status').val(button.data('status'))
  })
</script>
@endsection