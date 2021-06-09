@extends('layouts.tourismo.ui')
@section('merchant')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('content')
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.html">Merchant</a></li>
            <li>About Usddd</li>
          </ol>
        </div>
      </div>
</section>

<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="col-lg-3">
  @include('layouts.tourismo.menu')
</div>


<div class="col-lg-9">
<form action="{{ route('profile-save') }}" method="post" role="form" class="cls-profile">
@csrf

<div class="row row-margin">
<div class="col-md-12 form-group mt-3">
  <div class="uk-alert-danger" uk-alert>
      <a class="uk-alert-close" uk-close></a>
      <p class="alert-font-size"> 
       <span class="uk-margin-small-right" uk-icon="info"></span>We required to update the following as merchant identity!
      </p>
  </div>
</div>


<div class="col-md-12 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Merchant Name</label>
<input type="text" class="uk-input" name="companyname" id="companyname" value="" placeholder="Company Name">
<div class="validate"></div>
</div>

  <div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span>About</label>
  <input type="text" class="uk-input" name="about" id="about" value="" placeholder="Merchant Overview">
  <div class="validate"></div>
  </div>


<div class="col-md-12 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span>Merchant Type</label>
<select class="uk-select" name="mtype">
  @foreach($type as $list)
    <option value="{{ $list->id }}">{{ $list->id }}</option>
  @endforeach
</select>
</div>


<div class="col-md-12 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Merchant Address</label>
<input type="text" class="uk-input" name="companyaddress" id="companyaddress" placeholder="Company Address">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> E-mail</label>
<input type="text" class="uk-input" name="email" id="email" placeholder="E-mail">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Website</label>
<input type="text" class="uk-input" name="website" id="website" placeholder="Website">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Tel No.</label>
<input type="text" class="uk-input" name="telno" id="telno" placeholder="Telephone Number">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Mobile No.</label>
<input type="text" class="uk-input" name="mobileno" id="mobileno" placeholder="Mobile Number">
<div class="validate"></div>
</div>

<div class="text-left"><br>
    <button type="submit" class="uk-button uk-button-primary uk-button-small">Update</button>
</div>           
</div>           

</form>

</div>
</section>

@endsection
