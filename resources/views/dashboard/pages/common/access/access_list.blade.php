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
      <i class="fas fa-plus fa-sm text-white-50"></i> Add Access
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
      <h6 class="m-0 font-weight-bold text-primary">Access List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Slug</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($access as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->slug}}</td>
                <td>{{$item->description}}</td>
                <td style="text-align: center; width: 20%">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-name="{{$item->name}}"
                  data-description="{{$item->description}}"
                  >
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="{{route('common-access-delete', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to delete this?')" title="Delete Data"><i class="fas fa-trash"></i></a>
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
    <div class="modal-dialog modal-lg" role="document">
      <form action="{{route('common-access-create')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Access</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="form-group">
              <label class="control-label">Access</label>
              <input class="form-control" type="text" name="name" placeholder="input access name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea class="form-control" name="description" placeholder="input access description" required></textarea>
            </div>

            <hr>
            <div class="table-responsive">
              <p>Permission List</p>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Permission Name</th>
                    <th>Permission Route</th>
                    <th>Route Type</th>
                    <th>Select</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($permission as $item)
                    <tr>
                      <td>{{$item->name}}</td>
                      <td>{{$item->route}}</td>
                      <td>{{$item->route_type}}</td>
                      <td style="text-align: center">
                        <input name="permission_id[]" class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{$item->id}}">
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
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
    <div class="modal-dialog modal-lg" role="document">
      <form action="{{route('common-access-update')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Access</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">
            
            <div class="form-group">
              <label class="control-label">Access</label>
              <input class="form-control" type="text" name="name" id="name" placeholder="input access name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea class="form-control" name="description" id="description" placeholder="input access description" required></textarea>
            </div>

            <div id="permission_list">

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
    modal.find('#description').val(button.data('description'))

    var access_id = button.data('id')
    var url = '{{ route("common-access-get-permission", ["access_id" => ":id"]) }}'
    url = url.replace(':id', access_id )
    $.ajax({
      type: 'get',
      data: {_token: '{{ csrf_token() }}'},
      url: url,
      success: function (data) {
        $("#permission_list").html(data)
      }
    })
  })
</script>
@endsection