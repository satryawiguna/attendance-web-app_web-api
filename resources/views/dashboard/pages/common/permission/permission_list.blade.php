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
      <i class="fas fa-plus fa-sm text-white-50"></i> Add Permission
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
      <h6 class="m-0 font-weight-bold text-primary">Permission List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Permission Name</th>
              <th>Slug</th>
              <th>Route</th>
              <th>Route Type</th>
              <th>Restricted</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permission as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->slug}}</td>
                <td>{{$item->route}}</td>
                <td>{{$item->route_type}}</td>
                <td>{{$item->restrictedStatus()}}</td>
                <td style="text-align: center">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-name="{{$item->name}}"
                  data-route="{{$item->route}}"
                  data-route_type="{{$item->route_type}}"
                  data-url="{{$item->url}}"
                  data-is_restricted="{{$item->is_restricted}}"
                  data-description="{{$item->description}}"
                  >
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="{{route('common-permission-delete', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to delete this?')" title="Delete Data"><i class="fas fa-trash"></i></a>
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
      <form action="{{route('common-permission-create')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create Permission</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label class="control-label">Permission Name</label>
              <input class="form-control" type="text" name="name" placeholder="input permission name" required>
            </div>
            
            <div class="form-group">
              <label class="control-label">Route</label>
              <input class="form-control" type="text" name="route" placeholder="input permission route" required>
            </div>

            <div class="form-group">
              <label class="control-label">Route Type</label>
              <select name="route_type" class="form-control" required>
                <option value="" selected hidden disabled>Choose Route Type!</option>
                <option value="web">WEB Route</option>
                <option value="api">API Route</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Url</label>
              <input class="form-control" type="text" name="url" placeholder="input permission url" required>
            </div>

            <div class="form-group">
              <label class="control-label">Restricted</label>
              <select name="is_restricted" id="group_type" class="form-control" required>
                <option value="" selected hidden disabled>Choose Restricted Type!</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea class="form-control" name="description" placeholder="input permission description" required></textarea>
            </div>

            <hr>
            <div id="role_permission">

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
      <form action="{{route('common-permission-update')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Permission</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">
            
            <div class="form-group">
              <label class="control-label">Permission Name</label>
              <input class="form-control" type="text" name="name" id="name" placeholder="input permission name" required>
            </div>
            
            <div class="form-group">
              <label class="control-label">Route</label>
              <input class="form-control" type="text" name="route" id="route" placeholder="input permission route" required>
            </div>

            <div class="form-group">
              <label class="control-label">Route Type</label>
              <select name="route_type" id="route_type" class="form-control" required>
                <option value="" selected hidden disabled>Choose Route Type!</option>
                <option value="web">WEB Route</option>
                <option value="api">API Route</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Url</label>
              <input class="form-control" type="text" name="url" id="url" placeholder="input permission url" required>
            </div>

            <div class="form-group">
              <label class="control-label">Restricted</label>
              <select name="is_restricted" id="is_restricted" class="form-control" required>
                <option value="" selected hidden disabled>Choose Restricted Type!</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea class="form-control" name="description" id="description" placeholder="input permission description" required></textarea>
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
    $('#dataTable').DataTable({
      "ordering": false
    });
  });

  $('#modalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    modal.find('#id').val(button.data('id'))
    modal.find('#name').val(button.data('name'))
    modal.find('#route').val(button.data('route'))
    modal.find('#route_type').val(button.data('route_type'))
    modal.find('#url').val(button.data('url'))
    modal.find('#is_restricted').val(button.data('is_restricted'))
    modal.find('#description').val(button.data('description'))
  })

  $('#group_type').on('change', function () {
    $.ajax({
      type: 'post',
      data: {
        _token: '{{ csrf_token() }}',
        group_id: $('#group_type').val()
      },
      url: '{{route("common-permission-get-role")}}',
      success: function (data) {
        $("#role_permission").html(data)
      }
    })
  })
</script>
@endsection