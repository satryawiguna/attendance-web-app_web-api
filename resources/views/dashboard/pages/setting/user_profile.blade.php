@extends('dashboard.layouts.master')
@section('custom_css')
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
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

  <!-- Content Row -->
  <div class="row">

    <!-- Photo Profile -->
    <div class="col-xl-4 col-lg-4">
      <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body text-center">
          <img src="{{asset('dasbor/img/person.jpg')}}" style="max-width: 150px; margin-top: 10px;">
          <p style="font-size: 24px; font-weight: bold; margin-top: 20px;">{{$user->userProfile['nick_name']}}</p>
          <p style="margin-top: -20px;">{{$user->userRole->role->name}}</p>
          <p style="margin-top: 25px; font-size: 17px">ID User: {{$user->id}}</p>
          @if ($user->userRole->role->id == 3)
            <div class="col-md-12">
              <hr>
              {{-- <a href="{{route('setting-feature')}}" class="btn btn-light"><i class="fas fa-cogs"></i> Feature Settings</a> --}}
            </div>
          @endif
        </div>
      </div>
    </div>

    <!-- Data Profile -->
    <div class="col-xl-8 col-lg-8">
      <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 ml-4">
              <div class="form-group">
                <label style="font-weight: bold">Email</label>
                <p>{{$user->email}}</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">Fullname</label>
                <p>{{$user->userProfile['full_name']}}</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">Gender</label>
                <p>{{ucfirst(strtolower($user->userProfile['gender']))}}</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">Religion</label>
                <p>{{$user->userProfile['religion']['religion_name']}}</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">Country</label>
                <p>{{$user->userProfile['country']['country_name']}}</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">City</label>
                <p>{{$user->userProfile['city']['city_name']}}</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">Address</label>
                <p>{{$user->userProfile['address']}}</p>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label style="font-weight: bold">Password</label>
                <p>******</p>
              </div>
              <div class="form-group">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">Birth Date</label>
                <p>{{$user->userProfile['birth_date']}}</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">Phone</label>
                <p>{{$user->userProfile['phone']}}</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">Province</label>
                <p>{{$user->userProfile['state']['state_name']}}</p>
              </div>
              <div class="form-group">
                <label style="font-weight: bold">Postalcode</label>
                <p>{{$user->userProfile['postcode']}}</p>
              </div>
            </div>
          </div>
          <a href="{{route('setting-update-profile')}}" class="btn btn-primary float-right"><i class="fas fa-edit"></i> Edit Data</a>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
@section('custom_js')
@endsection