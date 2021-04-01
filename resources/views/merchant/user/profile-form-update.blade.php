@extends('layouts.tourismo.ui')
  @section('merchant')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  @endsection

@section('content')

<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

  <div class="col-lg-3">
          @include('layouts.tourismo.menu')
  </div>



<div class="col-lg-9">
<form action="{{ route('profile-save') }}" method="post" role="form" class="php-email-formx">
@csrf
<div class="row">

<div class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p class="alert-font-size"> 
      We required to update the following as merchant identity!
    </p>
</div>

<div class="section-title">
<h2> Merchant Information</h2>
</div>

<div class="form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Merchant Name</label>
<input type="text" class="form-control" name="companyname" id="companyname" placeholder="Company Name">
<div class="validate"></div>
</div>

<div class="form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Merchant Address</label>
<input type="text" class="form-control" name="companyaddress" id="companyaddress" placeholder="Company Address">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> E-mail</label>
<input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Website</label>
<input type="text" class="form-control" name="website" id="website" placeholder="Website">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Tel No.</label>
<input type="text" class="form-control" name="telno" id="telno" placeholder="Telephone Number">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Mobile No.</label>
<input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Mobile Number">
<div class="validate"></div>
</div>

<div class="text-left"><br><button type="submit" class="btn btn-primary btn-block">Update</button><br><br><br></div>                
</form>

</div>
</section>

@endsection
