<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smart Attendance - Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('dasbor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('dasbor/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register Member!</h1>
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
              <form class="user" action="{{route('register')}}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                  <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="nick_name" class="form-control" placeholder="Nick Name" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="number" name="nik" class="form-control" placeholder="NIK (Identity Number)" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirmation Password" required>
                  </div>
                </div>

                {{-- <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="religion_id" class="form-control" required>
                      <option value="" selected hidden disabled>Select Religion!</option>
                      @foreach ($religion as $item)
                        <option value="{{$item->id}}">{{$item->religion_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select name="gender" class="form-control" required>
                      <option value="" selected hidden disabled>Select Gender!</option>
                      <option value="MALE">Male</option>
                      <option value="FEMALE">Female</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="birth_place" class="form-control" placeholder="Birth Place" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="birth_date" class="form-control" placeholder="Birth Date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                  </div>
                </div>

                <div class="form-group">
                  <textarea class="form-control" name="address" placeholder="Address"></textarea required>
                </div> --}}

                <button type="submit" href="login.html" class="btn btn-primary btn-user btn-block">Register Account</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{route('forgot-password')}}">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('dasbor/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('dasbor/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('dasbor/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('dasbor/js/sb-admin-2.min.js')}}"></script>

  <script>
    $('form').submit(function() {
      $(this).find('button[type=submit]').prop('disabled', true);
    });
  </script>

</body>

</html>
