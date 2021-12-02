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
              <a href="{{route('setting-feature')}}" class="btn btn-light"><i class="fas fa-cogs"></i> Feature Settings</a>
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
          <form action="{{route('setting-update-profile')}}" method="post">
            {{ csrf_field() }}
          
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label style="font-weight: bold">Email</label>
                  <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">Fullname</label>
                  <input type="text" class="form-control" name="full_name" value="{{$user->userProfile['full_name']}}" required>
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">Gender</label>
                  <select name="gender" class="form-control">
                    <option value="MALE" {{$user->userProfile['gender'] == 'MALE' ? 'selected' : ''}}>Male</option>
                    <option value="FEMALE" {{$user->userProfile['gender'] == 'FEMALE' ? 'selected' : ''}}>Female</option>
                  </select>
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">Religion</label>
                  <select name="religion" class="form-control">
                    @foreach ($religion as $item)
                      <option value="{{$item->id}}" {{$user->userProfile['religion']['id'] == $item->id ? 'selected' : ''}}>{{$item->religion_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">Country</label>
                  <select name="country" class="form-control">
                    @foreach ($country as $item)
                      <option value="{{$item->id}}" {{$user->userProfile['country']['id'] == $item->id ? 'selected' : ''}}>{{$item->country_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">City</label>
                  <select name="city" class="form-control">
                    @foreach ($city as $item)
                      <option value="{{$item->id}}" {{$user->userProfile['city']['id'] == $item->id ? 'selected' : ''}}>{{$item->city_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label style="font-weight: bold">New Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">Confirm New Password</label>
                  <input type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">Birth Date</label>
                  <input type="date" class="form-control" name="birth_date" value="{{$user->userProfile['birth_date']}}">
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">Phone</label>
                  <input type="number" class="form-control" name="phone" value="{{$user->userProfile['phone']}}">
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">Province</label>
                  <select name="state" class="form-control">
                    @foreach ($state as $item)
                      <option value="{{$item->id}}" {{$user->userProfile['state']['id'] == $item->id ? 'selected' : ''}}>{{$item->state_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label style="font-weight: bold">Postalcode</label>
                  <input type="number" class="form-control" name="postcode" value="{{$user->userProfile['postcode']}}">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label style="font-weight: bold">Address</label>
              <textarea class="form-control" name="address" rows=3>{{$user->userProfile['address']}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-edit"></i> Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
@section('custom_js')
@endsection