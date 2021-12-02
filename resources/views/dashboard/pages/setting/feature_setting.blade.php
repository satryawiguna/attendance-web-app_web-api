@extends('dashboard.layouts.master')
@section('custom_css')
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Feature Settings</h1>
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
      <h6 class="m-0 font-weight-bold text-primary">Feature List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Feature Name</th>
              <th>Unit</th>
              <th>Description</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($feature as $item)
              <tr>
                <td>{{$item->feature_name}}</td>
                <td>{{ucfirst($item->unit_status)}}</td>
                <td>{{$item->description}}</td>
                <td style="text-align: center;">{{$item->getSetting() ? $item->getSetting()['setting_status'] : 'Non Active'}}</td>
                <td style="text-align: center;">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-min_value="{{$item->getSetting() ? $item->getSetting()['min_value'] : 0}}"
                  data-max_value="{{$item->getSetting() ? $item->getSetting()['max_value'] : 0}}"
                  data-active_status="{{$item->getSetting() ? $item->getSetting()['active_status'] : 0}}"
                  >
                    <i class="fas fa-edit"></i>
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
      <form action="{{route('setting-feature')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">
            
            <div class="form-group">
              <label class="control-label">Minimum Value</label>
              <input class="form-control" type="number" name="min_value" id="min_value" placeholder="input minimum value" required>
            </div>

            <div class="form-group">
              <label class="control-label">Maximum Value</label>
              <input class="form-control" type="number" name="max_value" id="max_value" placeholder="input maximum value" required>
            </div>

            <div class="form-group">
              <label class="control-label">Status</label>
              <select name="active_status" id="active_status" class="form-control">
                <option value="" selected hidden disabled>Choose Status!</option>
                <option value="1">Active</option>
                <option value="0">Non Active</option>
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
    modal.find('#min_value').val(button.data('min_value'))
    modal.find('#max_value').val(button.data('max_value'))
    modal.find('#active_status').val(button.data('active_status'))
  })
</script>
@endsection