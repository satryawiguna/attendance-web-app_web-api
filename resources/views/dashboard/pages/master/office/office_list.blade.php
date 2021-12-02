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
      <i class="fas fa-plus fa-sm text-white-50"></i> Add Office
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
      <h6 class="m-0 font-weight-bold text-primary">Office List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Office</th>
              <th>Company</th>
              <th>Slug</th>
              <th>Longitude</th>
              <th>Latitude</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($office as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->company->name}}</td>
                <td>{{$item->slug}}</td>
                <td>{{$item->longitude}}</td>
                <td>{{$item->latitude}}</td>
                <td style="text-align: center; width: 20%">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-company_id="{{$item->company_id}}"
                  data-name="{{$item->name}}"
                  data-longitude="{{$item->longitude}}"
                  data-latitude="{{$item->latitude}}"
                  >
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="{{route('master-office-delete', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to delete this?')" title="Delete Data"><i class="fas fa-trash"></i></a>
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
      <form action="{{route('master-office-create')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Office</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="form-group">
              <label class="control-label">Name</label>
              <input class="form-control" type="text" name="name" placeholder="input office name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Longitude</label>
              <input class="form-control" type="text" name="longitude" placeholder="input office longitude" required>
            </div>

            <div class="form-group">
              <label class="control-label">Latitude</label>
              <input class="form-control" type="text" name="latitude" placeholder="input office latitude" required>
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
      <form action="{{route('master-office-update')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Office</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">
            
            <div class="form-group">
              <label class="control-label">Name</label>
              <input class="form-control" type="text" name="name" id="name" placeholder="input office name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Longitude</label>
              <input class="form-control" type="text" name="longitude" id="longitude" placeholder="input office longitude" required>
            </div>

            <div class="form-group">
              <label class="control-label">Latitude</label>
              <input class="form-control" type="text" name="latitude" id="latitude" placeholder="input office latitude" required>
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
    modal.find('#company_id').val(button.data('company_id'))
    modal.find('#name').val(button.data('name'))
    modal.find('#longitude').val(button.data('longitude'))
    modal.find('#latitude').val(button.data('latitude'))
  })
</script>
@endsection