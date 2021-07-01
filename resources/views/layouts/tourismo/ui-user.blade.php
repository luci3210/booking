<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TourismoPH</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ asset('public/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('public/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @yield('third_party_stylesheets')
  @stack('page_css')

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <link href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/aos/aos.css') }}" rel="stylesheet">

  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/css/uikit.css'>

  <style type="text/css">
    #header.header-transparent
    {
      background: #1e4356 !important;
    }/*
    .breadcrumbs
    {
      background-color: #fff;
    }*/
    .uk-accordion {
      margin-left: 5px;
    }
    .card{
      margin: 10px 0 10px 0;
    }
    .list-group-item
    {
      padding: none !important;
    }
    .p-list-group-item
    {
      display: block;
      margin: 7px auto;
    }
     .col-form-label
    {
      font-size: 14px;
      /*font-weight: normal !important;*/
    }
    .services .icon-box
    {
      padding:30px 7px 30px 7px !important;
    }
    .pricing-title
    {
      text-align: center;
      padding: 40px 0px 0px 0px;
    }
    .services .description
    {
    font-size: 14px !important;
    line-height: 1px !important;
    margin-bottom: 0 !important;
    }
    .uk-accordion-title
    {
      font-size: 16px;
    }
    .uk-list-spc-acco
    {
      margin: 20px 50px 0px 0px !important;
      text-decoration: none; 
    }
    .uk-list-spc
    {
      margin: 17px 0 17px 0;
      text-decoration: none;
    }
    .uk-list-spc :hover
    {
      text-decoration: none;
      color: #777575;

    }
    .uk-list-a
    {
      color: #353434;
      margin-left: 5px;
    }
  </style>

</head>

<body>

  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="{{ route('myhome') }}"><span><img src="{{ asset('image/logo/logo.png') }}"></span></a></h1>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html"><b>Download App</b></a></li>
          <li><a href="about.html">Help</a></li>
          <li><a href="services.html">Recently Veiw</a></li>
          <li><a href="portfolio.html">Cart</a></li>
@if (Route::has('login'))
@auth
    <li class="drop-down"><a href="">Account</a>
      <ul>
        <li><a href="#">Drop Down 1</a></li>
        <li class="drop-down"><a href="#">Drop Down 2</a>
          <ul>
            <li><a href="#">Deep Drop Down 1</a></li>
            <li><a href="#">Deep Drop Down 2</a></li>
            <li><a href="#">Deep Drop Down 3</a></li>
            <li><a href="#">Deep Drop Down 4</a></li>
            <li><a href="#"><span uk-icon="heart"></span> Settings</a></li>
          </ul>
        </li>
        <li><a href="#">Drop Down 3</a></li>
        <li><a href="#">Drop Down 4</a></li>
        <li><a href="{{ route('account-setting') }}"><span uk-icon="settings"></span> Settings</a></li>
      </ul>
    </li>
@else
    <li><a href="#login" uk-toggle>Login</a></li>

    @if (Route::has('register'))
        <!-- <a href="{{ route('register') }}">Register</a> -->
        <li><a href="#register" uk-toggle>SignUp</a></li>
    @endif
@endauth

@endif

<li><a href="contact.html">Author</a></li>
</ul>
</nav>
</div>
</header>


<!-- INMOD -->
<div id="login" class="uk-modal-full" uk-modal>
<div class="uk-modal-dialog">
<button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center">Booking Tourismosss</h3>
                        
    <form method="POST" action="{{ route('login') }}">
      @csrf
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input class="uk-input uk-form-meduim" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input uk-form-meduim" type="password" name="password" required autocomplete="current-password">  
            </div>
        </div>

        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label><input class="uk-checkbox" type="checkbox"> Remember Me</label>
        </div>

        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-primary uk-button-meduim uk-width-1-1">Login</button>
        </div>
        <div class="uk-text-small uk-text-center">
            Not registered? <a href="#register" uk-toggle>Register</a>
        </div>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>



<!-- REGMOD -->
<div id="register" class="uk-modal-full" uk-modal>
<div class="uk-modal-dialog">
<button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center">Booking Tosssurismo</h3>
                        
    <form>
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input class="uk-input uk-form-meduim" type="text" placeholder="Name">
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input class="uk-input uk-form-meduim" type="text" placeholder="Email">
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input uk-form-meduim" type="password" placeholder="Password">  
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input uk-form-meduim" type="password" placeholder="Re-Enter Password">  
            </div>
        </div>

        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label><input class="uk-checkbox" type="checkbox"> Remember Me</label>
        </div>

        <div class="uk-margin">
            <button class="uk-button uk-button-primary uk-button-meduim uk-width-1-1">Register</button>
        </div>
        <div class="uk-text-small uk-text-center">
            Forgot password? <a href="#login" uk-toggle>Click me!</a>
        </div>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>


 
<main id="main">
@yield('content')
</main>

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Moderna</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Moderna</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('public/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('public/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('public/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('public/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('public/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('public/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('public/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('public/js/main.js') }}"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/js/uikit.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/js/uikit-icons.js'></script>
  

</body>

</html>