@extends('dashboard.layouts.master')
@section('custom_css')
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <div>
      <a href="{{route('project-mutation-list')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class='fas fa-arrow-left text-white-50'></i> Back</a>
      <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter">
        <i class="fas fa-plus text-white-50"></i> Add Project Mutation
      </button>
    </div>
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
      <h6 class="mb-3 font-weight-bold text-primary">Project Mutation List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Project Name</th>
              <th>Reference Number</th>
              <th>Mutation Date</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projectMutation as $item)
              <tr>
                <td>{{$item->project->name}}</td>
                <td>{{$item->project->reference_number}}</td>
                <td>{{date('d/m/Y', strtotime($item->mutation_date))}}</td>
                <td>{{date('d/m/Y', strtotime($item->project->start_date))}}</td>
                <td>{{date('d/m/Y', strtotime($item->project->end_date))}}</td>
                <td style="text-align: center; width: 20%">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-project_id="{{$item->project_id}}"
                  data-mutation_date="{{$item->mutation_date}}"
                  >
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="{{route('project-mutation-delete', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to delete this?')" title="Delete Data"><i class="fas fa-trash"></i></a>
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
      <form action="{{route('project-mutation-update', ['employee_id' => $employee_id])}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Project Mutation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label class="control-label">Project</label>
              <select name="project_id" class="form-control">
                <option value="" selected hidden disabled>Choose Project!</option>
                @foreach ($project as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Mutation Date</label>
              <input class="form-control" type="date" name="mutation_date" placeholder="input mutation date" required>
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
      <form action="{{route('project-mutation-update-item')}}" method="post">
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
              <label class="control-label">Project</label>
              <select name="project_id" id="project_id" class="form-control">
                <option value="" selected hidden disabled>Choose Project!</option>
                @foreach ($project as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Mutation Date</label>
              <input class="form-control" type="date" name="mutation_date" id="mutation_date" placeholder="input mutation date" required>
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
    $('#dataTable').DataTable();
  });

  $('#modalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    modal.find('#id').val(button.data('id'))
    modal.find('#project_id').val(button.data('project_id'))
    modal.find('#mutation_date').val(button.data('mutation_date'))
  })
</script>
@endsection