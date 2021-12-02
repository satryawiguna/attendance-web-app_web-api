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
      <i class="fas fa-plus fa-sm text-white-50"></i> Add Project Addendum
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
      <h6 class="m-0 font-weight-bold text-primary">Project Addendum List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Project Name</th>
              <th>Reference Number</th>
              <th>Addendum Name</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projectAddendum as $item)
              <tr>
                <td>{{$item->project['name']}}</td>
                <td>{{$item->reference_number}}</td>
                <td>{{$item->name}}</td>
                <td>{{date('d/m/Y', strtotime($item->start_date))}}</td>
                <td>{{date('d/m/Y', strtotime($item->end_date))}}</td>
                <td>{{$item->description}}</td>
                <td style="text-align: center; width: 20%">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-project_id="{{$item->project_id}}"
                  data-name="{{$item->name}}"
                  data-reference_number="{{$item->reference_number}}"
                  data-start_date="{{$item->start_date}}"
                  data-end_date="{{$item->end_date}}"
                  data-description="{{$item->description}}"
                  >
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="{{route('project-addendum-delete', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to delete this?')" title="Delete Data"><i class="fas fa-trash"></i></a>
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
      <form action="{{route('project-addendum-create')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Project Addendum</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label class="control-label">Project List</label>
              <select name="project_id" class="form-control" required>
                <option value="" selected hidden disabled>Choose Project!</option>
                @foreach ($project as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <label class="control-label">Addendum Name</label>
              <input class="form-control" type="text" name="name" placeholder="input addendum name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Reference Number</label>
              <input class="form-control" type="text" name="reference_number" placeholder="input reference name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Start Date</label>
              <input class="form-control" type="date" name="start_date" placeholder="input project name" required>
            </div>

            <div class="form-group">
              <label class="control-label">End Date</label>
              <input class="form-control" type="date" name="end_date" placeholder="input project name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea class="form-control" placeholder="input description" name="description"></textarea>
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
      <form action="{{route('project-addendum-update')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">

            <div class="form-group">
              <label class="control-label">Parent</label>
              <select name="project_id" id="project_id" class="form-control">
                @foreach ($project as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <label class="control-label">Addendum Name</label>
              <input class="form-control" type="text" name="name" id="name" placeholder="input addendum name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Reference Number</label>
              <input class="form-control" type="text" name="reference_number" id="reference_number" placeholder="input project name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Start Date</label>
              <input class="form-control" type="date" name="start_date" id="start_date" placeholder="input project name" required>
            </div>

            <div class="form-group">
              <label class="control-label">End Date</label>
              <input class="form-control" type="date" name="end_date" id="end_date" placeholder="input project name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea class="form-control" placeholder="input description" name="description" id="description"></textarea>
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
    modal.find('#project_id').val(button.data('project_id'))
    modal.find('#name').val(button.data('name'))
    modal.find('#reference_number').val(button.data('reference_number'))
    modal.find('#start_date').val(button.data('start_date'))
    modal.find('#end_date').val(button.data('end_date'))
    modal.find('#description').val(button.data('description'))
  })
</script>
@endsection