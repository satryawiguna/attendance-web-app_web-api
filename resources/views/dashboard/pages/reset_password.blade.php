<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smart Attendance - Reset Password</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('dasbor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('dasbor/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Reset Your Password</h1>
                    <p class="mb-4">We get it, stuff happens. Enter a new password to reset your password!</p>
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
                  <form class="user" method="post" action="{{route('reset-password', ['token' => $token])}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Enter a New Password">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password_confirm" class="form-control form-control-user" placeholder="Enter New Password Confirmation">
                    </div>
                    <button type="submit" href="login.html" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                  </div>
                </div>
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
