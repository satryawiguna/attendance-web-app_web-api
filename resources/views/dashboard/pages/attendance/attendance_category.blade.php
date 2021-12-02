@extends('dashboard.layouts.master')
@section('custom_css')
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter">
      <i class="fas fa-plus fa-sm text-white-50"></i> Add Attendance Category
    </button>
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
      <h6 class="m-0 font-weight-bold text-primary">City List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Attendance Type</th>
              <th>Attendance Validation</th>
              <th>Time Start</th>
              <th>Time End</th>
              <th>Time Tolerance</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($attendanceCategory as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td>{{ucfirst(strtolower($item->type))}}</td>
                <td>{{$item->getValidateStatus()}}</td>
                <td>{{$item->time_start ? date('H:i', strtotime($item->time_start)) : ''}}</td>
                <td>{{$item->time_end ? date('H:i', strtotime($item->time_end)) : ''}}</td>
                <td>{{$item->time_tolerance ? $item->time_tolerance : 0}} Minutes</td>
                <td style="text-align: center">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-name="{{$item->name}}"
                  data-type="{{$item->type}}"
                  data-is_validate="{{$item->is_validate}}"
                  data-time_start="{{$item->time_start}}"
                  data-time_end="{{$item->time_end}}"
                  data-time_tolerance="{{$item->time_tolerance}}"
                  >
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="{{route('attendance-category-delete', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to delete this?')" title="Delete Data"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Create-->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="{{route('attendance-category-create')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create Attendance Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label class="control-label">Attendance Category Name</label>
              <input class="form-control" type="text" name="name" placeholder="input attendance category name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Attendance Type</label>
              <select name="type" class="form-control" required>
                <option value="" selected hidden disabled>Choose Attendance Category Type!</option>
                <option value="absent">Absent</option>
                <option value="present">Present</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Validate this Category</label>
              <select name="is_validate" class="form-control" required>
                <option value="" selected hidden disabled>Choose Yes/No!</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Time Start</label>
              <input class="form-control" type="time" name="time_start" placeholder="input attendance category time start">
            </div>

            <div class="form-group">
              <label class="control-label">Time End</label>
              <input class="form-control" type="time" name="time_end" placeholder="input attendance category time end">
            </div>

            <div class="form-group">
              <label class="control-label">Time Tolerance</label>
              <input class="form-control" type="number" name="time_tolerance" placeholder="input attendance category time tolerance">
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
      <form action="{{route('attendance-category-update')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit City</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">

            <div class="form-group">
              <label class="control-label">Attendance Category Name</label>
              <input class="form-control" type="text" id="name" name="name" placeholder="input attendance category name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Attendance Type</label>
              <select id="type" name="type" class="form-control" required>
                <option value="" selected hidden disabled>Choose Attendance Category Type!</option>
                <option value="absent">Absent</option>
                <option value="present">Present</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Validate this Category</label>
              <select id="is_validate" name="is_validate" class="form-control" required>
                <option value="" selected hidden disabled>Choose Yes/No!</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Time Start</label>
              <input class="form-control" type="time" id="time_start" name="time_start" placeholder="input attendance category time start">
            </div>

            <div class="form-group">
              <label class="control-label">Time End</label>
              <input class="form-control" type="time" id="time_end" name="time_end" placeholder="input attendance category time end">
            </div>

            <div class="form-group">
              <label class="control-label">Time Tolerance</label>
              <input class="form-control" type="number" id="time_tolerance" name="time_tolerance" placeholder="input attendance category time tolerance">
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
    modal.find('#name').val(button.data('name'))
    modal.find('#type').val(button.data('type'))
    modal.find('#is_validate').val(button.data('is_validate'))
    modal.find('#time_start').val(button.data('time_start'))
    modal.find('#time_end').val(button.data('time_end'))
    modal.find('#time_tolerance').val(button.data('time_tolerance'))
  })
</script>
@endsection