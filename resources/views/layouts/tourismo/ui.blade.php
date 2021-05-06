<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>TourismoPH</title>
  <meta content="" name="Tourismo">
  <meta content="" name="Tourismo">
  <link href="{{ asset('image/logo/favicon.png') }}" rel="icon">
  <link href="{{ asset('image/logo/favicon.png') }}" rel="apple-touch-icon">

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
  @yield('merchant')
</head>
<body>
@include('sweetalert::alert')
@include('layouts.tourismo.ui-header')

@yield('banner')
@yield('modal_login')

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
            <p>. . . . . .</p>
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
            <h3>About TourismoPH</h3>
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
        &copy; Copyright <strong><span>TourismoPH</span></strong>. All Rights Reserved
      </div>
      <!-- <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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

  <script src="{{ asset('public/js/main.js') }}"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/js/uikit.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/js/uikit-icons.js'></script>
  <script src="https://kit.fontawesome.com/f0c1ec087f.js" crossorigin="anonymous"></script>

  @yield('merchantjs')
  @yield('js')

</body>

</html>