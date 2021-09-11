<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css"> -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    @yield('third_party_stylesheets')
    @stack('page_css')
    @livewireStyles

    <style type="text/css">
        .col-form-label{
            font-weight: normal !important;
        }
        .card-title{
            font-weight: bold;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-user-shield"></i>
                    <span class="d-none d-md-inline">{{ Auth::user()->name }} <i class="fas fa-sort-down"></i></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <i class="fas fa-user-shield"></i>
                        <p>
                            {{ Auth::user()->name }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<div class="content-wrapper">

<!---------------------header dashbboard-------------------------->

<div class="content-header">
  <div class="container-fluid">
    
  </div>
</div>

<!----------------------end-------------------------------------->


<!---------------------- booking monitoring--------------------->

<section class="content">
<div class="container-fluid">



<div class="row">

<div class="col-md-2 col-sm-6 col-12">
<div class="info-box">
  <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">V-Request</span>
    <span class="info-box-number">1,410</span>
  </div>
</div>
</div>


<div class="col-md-2 col-sm-6 col-12">
<div class="info-box">
  <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">P-Request</span>
    <span class="info-box-number">1,410</span>
  </div>
</div>
</div>


<div class="col-md-2 col-sm-6 col-12">
<div class="info-box">
  <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
  <div class="info-box-content">
    <span class="info-box-text"><a href="{{ route('adm_withdrawal_request') }}" class="lead text-muted" style="font-size: .90em;">W-Request</a></span>
    <span class="info-box-number">1,410</span>
  </div>
</div>
</div>


<div class="col-md-2 col-sm-6 col-12">
<div class="info-box">
  <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">N-Booking</span>
    <span class="info-box-number">1,410</span>
  </div>
</div>
</div>


<div class="col-md-2 col-sm-6 col-12">
<div class="info-box">
  <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">C-Booking</span>
    <span class="info-box-number">1,410</span>
  </div>
</div>
</div>


<div class="col-md-2 col-sm-6 col-12">
<div class="info-box">
  <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">E-Booking</span>
    <span class="info-box-number">1,410</span>
  </div>
</div>
</div>

</div>














<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
  <div class="inner">
    <h4>#</h4>

    <p>Post Request</p>
  </div>
  <div class="icon">
    <i class="ion ion-bag"></i>
  </div>
  <a href="#" class="small-box-footer">Load Details <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-success">
  <div class="inner">
    <h4>#</h4>

    <p>New Booking</p>
  </div>
  <div class="icon">
    <i class="ion ion-stats-bars"></i>
  </div>
  <a href="{{ route('show_booking') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-info">
  <div class="inner">
    <h4>#</h4>

    <p>Confirm Booking</p>
  </div>
  <div class="icon">
    <i class="ion ion-person-add"></i>
  </div>
  <a href="{{ route('adm_confirm_booking') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
  <div class="inner">
    <h4>#</h4>
    <p>Execute Booking</p>
  </div>
  <div class="icon">
    <i class="ion ion-pie-graph"></i>
  </div>
  <a href="{{ route('adm_execute_booking') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
  <div class="inner">
    <h4>#</h4>
    <p>Execute Booking</p>
  </div>
  <div class="icon">
    <i class="ion ion-pie-graph"></i>
  </div>
  <a href="{{ route('adm_execute_booking') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

</div>
</div>
</section>

<!------------------------------end------------------------------>



<section class="content">
    @yield('content')
</section>

</div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Pv</b> 2.1
        </div>
        <strong>Copyright &copy; 2021-2022 <a href="#">TourismoPH</a>.</strong> All rights
        reserved.
    </footer>
</div>

<script src="{{ mix('js/app.js') }}" defer></script>
@yield('third_party_scripts')
@stack('page_scripts')
    <script src="https://use.fontawesome.com/cc6b4f0737.js"></script>
@include('sweetalert::alert')

</script>
<script type="text/javascript">
$('.itempack').select2({
  placeholder: 'Select package',
  allowClear:true
});
</script>

<script type="text/javascript">
$('#update_loadpacklist').select2({
  placeholder: 'Select package',
  ajax: {
    url:  '{{ route("datapackage") }}',
    dataType: 'json',
    delay: 250,
    processResults: function (data) {
      return {
        results:  $.map(data, function (item) {
              return {
                  text: item.package,
                  id: item.package
              }
          })
      };
    },
    cache: true
  }
});
</script>
@livewareScripts
</body>
</html>
