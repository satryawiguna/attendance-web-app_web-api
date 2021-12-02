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
      <i class="fas fa-plus fa-sm text-white-50"></i> Add Country
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
      <h6 class="m-0 font-weight-bold text-primary">Country List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Country Name</th>
              <th>Two Letter Code</th>
              <th>Phone Code</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($country as $item)
              <tr>
                <td>{{$item->country_name}}</td>
                <td>{{$item->two_letter_code}}</td>
                <td>{{$item->phone_code}}</td>
                <td style="text-align: center">
                  <button type="button" title="Update Data" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit"
                  data-id="{{$item->id}}"
                  data-country_name="{{$item->country_name}}"
                  data-two_letter_code="{{$item->two_letter_code}}"
                  data-phone_code="{{$item->phone_code}}"
                  >
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="{{route('common-country-delete', ['id' => $item->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure to delete this?')" title="Delete Data"><i class="fas fa-trash"></i></a>
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
      <form action="{{route('common-country-create')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create Country</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="form-group">
              <label class="control-label">Country Name</label>
              <input class="form-control" type="text" name="country_name" placeholder="input country name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Two Letter Code</label>
              <input class="form-control" type="text" name="two_letter_code" placeholder="input two letter code" required>
            </div>

            <div class="form-group">
              <label class="control-label">Phone Code</label>
              <input class="form-control" type="text" name="phone_code" placeholder="input phone code" required>
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
      <form action="{{route('common-country-update')}}" method="post">
        {{ csrf_field() }}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Country</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" id="id" name="id">
            
            <div class="form-group">
              <label class="control-label">Country Name</label>
              <input class="form-control" type="text" name="country_name" id="country_name" placeholder="input country name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Two Letter Code</label>
              <input class="form-control" type="text" name="two_letter_code" id="two_letter_code" placeholder="input two letter code" required>
            </div>

            <div class="form-group">
              <label class="control-label">Phone Code</label>
              <input class="form-control" type="text" name="phone_code" id="phone_code" placeholder="input phone code" required>
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
    modal.find('#country_name').val(button.data('country_name'))
    modal.find('#two_letter_code').val(button.data('two_letter_code'))
    modal.find('#phone_code').val(button.data('phone_code'))
  })
</script>
@endsection