@extends('layouts.tourismo.ui')
@section('merchant')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
@endsection
@section('content')

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

    <!-- <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200"> -->
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

                  <!-- /.tab-pane -->
</div>
</div>
</div>
</div>
</div>

</div>
</section>

@endsection
