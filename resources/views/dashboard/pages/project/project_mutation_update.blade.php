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
      <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
    </div>
    <form action="{{route('project-mutation-update', ['project_id' => $project_id])}}" method="post">
      {{ csrf_field() }}

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th>Employee NIP</th>
                <th>Employee Status</th>
                <th>Position</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employee as $item)
                <tr>
                  <td>{{$item->full_name}}</td>
                  <td>{{$item->nip}}</td>
                  <td>{{$item->getStatus()}}</td>
                  <td>{{$item->position->name}}</td>
                  <td style="text-align: center">
                    <input name="employee_id[]" class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{$item->id}}" {{in_array($item->id, $employee_id) ? 'checked' : ''}}>
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