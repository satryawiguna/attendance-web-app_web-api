<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>SmartAttendance</title>

<!-- Fav Icon -->
<link rel="icon" href="{{asset('landing/images/fav-icon.png')}}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{asset('landing/css/font-awesome-all.css')}}" rel="stylesheet">
<link href="{{asset('landing/css/flaticon.css')}}" rel="stylesheet">
<link href="{{asset('landing/css/owl.css')}}" rel="stylesheet">
<link href="{{asset('landing/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('landing/css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{asset('landing/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('landing/css/style.css')}}" rel="stylesheet">
<link href="{{asset('landing/css/responsive.css')}}" rel="stylesheet">
@yield('custom_css')

</head>


<!-- page wrapper -->
<body class="boxed_wrapper">

    <!-- preloader -->
    <div class="preloader"></div>
    <!-- preloader -->

    @include('landing.layouts.master_header')

    @yield('content')

    @include('landing.layouts.master_footer')

<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>

<!-- jequery plugins -->
<script src="{{asset('landing/js/jquery.js')}}"></script>
<script src="{{asset('landing/js/popper.min.js')}}"></script>
<script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
<script src="{{asset('landing/js/owl.js')}}"></script>
<script src="{{asset('landing/js/wow.js')}}"></script>
<script src="{{asset('landing/js/validation.js')}}"></script>
<script src="{{asset('landing/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('landing/js/appear.js')}}"></script>
<script src="{{asset('landing/js/circle-progress.js')}}"></script>
<script src="{{asset('landing/js/jquery.countTo.js')}}"></script>
<script src="{{asset('landing/js/scrollbar.js')}}"></script>
<script src="{{asset('landing/js/jquery.paroller.min.js')}}"></script>
<script src="{{asset('landing/js/tilt.jquery.js')}}"></script>

<!-- main-js -->
<script src="{{asset('landing/js/script.js')}}"></script>

@yield('custom_js')

</body><!-- End of .page_wrapper -->
</html>
