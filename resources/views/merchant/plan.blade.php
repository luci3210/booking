@extends('layouts.tourismo.ui')
  @section('merchant')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
  @endsection

@section('content')

@if (!empty($gatemerchant[0]->plan_key))
  

<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2></h2>
      <ol>
        <li><a href="{{ route('myhome') }}">Home</a></li>
        <li>Settings</li>
      </ol>
    </div>

  </div>
</section>

<section>
<div class="container">

<div class="row">
<div class="col-md-3">
@include('layouts.tourismo.menu')
</div>


<div class="col-md-9">
  <div class="card">

<div class="card-header p-2">
  <ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
  </ul>
</div>

<div class="card-body">
  <div class="tab-content">
    <div class="active tab-pane" id="activity">

<div class="post">        
<form role="form">
    <h4>Change username and password</h4>
    <div class="form-group">
      <label class="col-form-label">Enter Current Password</label>
      <input type="password" name="current_password" class="form-control form-control-sm">
    </div>

    <div class="form-group">
      <label class="col-form-label">New Password</label>
      <input type="password" name="newpassword" class="form-control form-control-sm">
    </div>

    <div class="form-group">
      <label class="col-form-label">Confirm New Password</label>
      <input type="password" name="confirmpassword" class="form-control form-control-sm">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
</div>

<div class="post clearfix">


<form role="form">
    <h4>Delete Account</h4>
    <div class="form-group">
      <label class="col-form-label">Enter Current Password</label>
      <input type="password" name="current_password" class="form-control form-control-sm">
    </div>

    <div class="form-group">
      <label class="col-form-label">Reason</label>
      <input type="password" name="newpassword" class="form-control form-control-sm">
    </div>

<div class="form-check">
  <input type="checkbox" class="form-check-input" name="delete_account">
  <label class="form-check-label" for="exampleCheck1"><b>I agree to the <a href="">terms and conditions</a></b></label>
</div><br>

    <button type="submit" class="btn btn-danger">Confirm</button>
  
</form>
</div>

</div>
</div>
</div>
</div>
</div>

</div>
</section>


@else
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2></h2>
      <ol>
        <li><a href="{{ route('myhome') }}"><span uk-icon="icon: home; ratio:1"></span></a></li>
        <li>Merchant</li>
      </ol>
    </div>

  </div>
</section>

<section class="pricing section-bg aos-animate" data-aos="fade-up">
      <div class="container">

        <div class="section-title">
          <h2>Merchant Plan</h2>
          <p>Explore some of the best tips from around the city from our partners and friends.</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-4 box">
            <h3>Free</h3>
            <h4>$0<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
              <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
            </ul>
            <a href="#" class="get-started-btn">Get Started</a>
          </div>

          <div class="col-lg-4 box featured">
            <h3>Business</h3>
            <h4>$29<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
              <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
            </ul>
            <a href="#" class="get-started-btn">Get Started</a>
          </div>

          <div class="col-lg-4 box">
            <h3>Developer</h3>
            <h4>$49<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
              <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
            </ul>
            <a href="#" class="get-started-btn">Get Started</a>
          </div>

        </div>

      </div>
    </section>



@endif

@endsection
