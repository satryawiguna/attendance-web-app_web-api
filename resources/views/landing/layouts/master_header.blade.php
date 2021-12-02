<!-- main header -->
<header class="main-header home-4">
  <div class="outer-container">
      <div class="container">
          <div class="main-box clearfix">
              <div class="logo-box pull-left">
                  <figure class="logo"><a href="index.html"><img src="{{asset('landing/images/logo-black.png')}}" style="max-width: 270px;" alt=""></a></figure>
              </div>
              <div class="menu-area pull-right clearfix">
                  <!--Mobile Navigation Toggler-->
                  <div class="mobile-nav-toggler">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                  </div>
                  <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                      <ul class="navigation clearfix">
                        <li class="current dropdown"><a href="{{url('/')}}">Home</a></li> 
                        <li class="dropdown"><a href="{{url('#feature')}}">Feature</a></li>
                        <li class="dropdown"><a href="{{url('#pricing')}}">Pricing</a></li>
                        <li class="dropdown"><a href="{{route('home')}}">Dashboard</a></li>
                      </ul>
                    </div>
                  </nav>
                  <div class="btn-box"><a href="#">Register Now</a></div>
              </div>
          </div>
      </div>
  </div>

  <!--sticky Header-->
  <div class="sticky-header">
    <div class="container clearfix">
      <figure class="logo-box"><a href="index.html"><img src="{{asset('landing/images/logo-white.png')}}" alt=""></a></figure>
      <div class="menu-area">
        <nav class="main-menu clearfix">
          <!--Keep This Empty / Menu will come through Javascript-->
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
  <div class="menu-backdrop"></div>
  <div class="close-btn"><i class="fas fa-times"></i></div>
  
  <nav class="menu-box">
      <div class="nav-logo"><a href="index.html"><img src="{{asset('landing/images/logo-white.png')}}" alt="" title=""></a></div>
      <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
      <div class="contact-info">
          <h4>Contact Info</h4>
          <ul>
              <li>Chicago 12, Melborne City, USA</li>
              <li><a href="tel:+8801682648101">+88 01682648101</a></li>
              <li><a href="mailto:info@example.com">info@example.com</a></li>
          </ul>
      </div>
      <div class="social-links">
          <ul class="clearfix">
              <li><a href="#"><span class="fab fa-twitter"></span></a></li>
              <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
              <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
              <li><a href="#"><span class="fab fa-instagram"></span></a></li>
              <li><a href="#"><span class="fab fa-youtube"></span></a></li>
          </ul>
      </div>
  </nav>
</div><!-- End Mobile Menu -->