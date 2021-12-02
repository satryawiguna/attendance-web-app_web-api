@extends('dashboard.layouts.master')
@section('custom_css')
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
      <h6 class="m-0 font-weight-bold text-primary">Project List</h6>
    </div>
    <form action="{{route('project-mutation-update', ['employee_id' => $employee_id])}}" method="post">
      {{ csrf_field() }}

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Project Name</th>
                <th>Reference Number</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($project as $item)
                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->reference_number}}</td>
                  <td>{{date('d/m/Y', strtotime($item->start_date))}}</td>
                  <td>{{date('d/m/Y', strtotime($item->end_date))}}</td>
                  <td style="text-align: center">
                    <input name="project_id[]" class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{$item->id}}" {{in_array($item->id, $project_id) ? 'checked' : ''}}>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save Change</button>
      </div>

    </form>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
@section('custom_js')
<script>
  $(document).ready(function() {
    // $('#dataTable').DataTable();
  });
</script>
@endsection