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
      <i class="fas fa-plus fa-sm text-white-50"></i> Add Work Area
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
      <h6 class="m-0 font-weight-bold text-primary">Work Area List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Code</th>
              <th>Title</th>
              <th>State</th>
              <th>City</th>
              <th>Address</th>
              <th>Postcode</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($workArea as $item)
              <tr>
                <td>{{$item->code}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->state->state_name}}</td>
                <td>{{$item->city->city_name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->postcode}}</td>
                <td style="text-align: center; width: 20%">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-code="{{$item->code}}"
                  data-title="{{$item->title}}"
                  data-country_id="{{$item->country_id}}"
                  data-state_id="{{$item->state_id}}"
                  data-city_id="{{$item->city_id}}"
                  data-address="{{$item->address}}"
                  data-postcode="{{$item->postcode}}"
                  >
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="{{route('master-work-area-delete', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to delete this?')" title="Delete Data"><i class="fas fa-trash"></i></a>
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
      <form action="{{route('master-work-area-create')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Work Area</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="form-group">
              <label class="control-label">Code</label>
              <input class="form-control" type="text" name="code" placeholder="input work area code" required>
            </div>

            <div class="form-group">
              <label class="control-label">Title</label>
              <input class="form-control" type="text" name="title" placeholder="input work area title" required>
            </div>

            <div class="form-group">
              <label class="control-label">Country</label>
              <select name="country_id" id="country_create" class="form-control">
                <option value="" selected hidden disabled>Choose Country!</option>
                @foreach ($country as $item)
                  <option value="{{$item->id}}">{{$item->country_name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group" id="state_default">
              <label class="control-label">State</label>
              <select name="state_id" class="form-control">
                <option value="" selected hidden disabled>Choose State!</option>
                <option value="" disabled>Choose Country First!</option>
              </select>
            </div>

            <div id="state_ajax"></div>

            <div class="form-group" id="city_default">
              <label class="control-label">City</label>
              <select name="city_id" id="city_create" class="form-control">
                <option value="" selected hidden disabled>Choose City!</option>
                <option value="" disabled>Choose State First!</option>
              </select>
            </div>

            <div id="city_ajax"></div>

            <div class="form-group">
              <label class="control-label">address</label>
              <textarea class="form-control" placeholder="input work area address" name="address"></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">postcode</label>
              <input class="form-control" type="number" name="postcode" placeholder="input work unit name" required>
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
      <form action="{{route('master-work-area-update')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Work Area</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">

            <div class="form-group">
              <label class="control-label">Code</label>
              <input class="form-control" type="text" name="code" id="code" placeholder="input work area code" required>
            </div>

            <div class="form-group">
              <label class="control-label">Title</label>
              <input class="form-control" type="text" name="title" id="title" placeholder="input work area title" required>
            </div>

            <div id="area_list"></div>

            <div class="form-group">
              <label class="control-label">address</label>
              <textarea class="form-control" placeholder="input work area address" name="address" id="address"></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">postcode</label>
              <input class="form-control" type="number" name="postcode" id="postcode" placeholder="input work unit name" required>
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
    modal.find('#code').val(button.data('code'))
    modal.find('#title').val(button.data('title'))
    modal.find('#state_id').val(button.data('state_id'))
    modal.find('#country_id').val(button.data('country_id'))
    modal.find('#city_id').val(button.data('city_id'))
    modal.find('#address').val(button.data('address'))
    modal.find('#postcode').val(button.data('postcode'))

    $.ajax({
      type: 'post',
      data: {
        _token: '{{ csrf_token() }}',
        id: button.data('id')
      },
      url: '{{route("master-work-area-list-ajax")}}',
      success: function (data) {
        $("#area_list").html(data)
      }
    })
  })

  $('#country_create').on('change', function () {
    $.ajax({
      type: 'post',
      data: {
        _token: '{{ csrf_token() }}',
        country_id: $('#country_create').val(),
        from: 'create'
      },
      url: '{{route("master-work-area-get-state")}}',
      success: function (data) {
        $("#state_ajax").html(data)
        $('#state_default').css('display', 'none');
      }
    })
  })
</script>
@endsection