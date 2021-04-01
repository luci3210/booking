@extends('layouts.tourismo.ui')
@section('merchant')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
@endsection

@section('content')
<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="col-lg-3">
      @include('layouts.tourismo.menu')
</div>

<div class="col-lg-9">
<form action="{{ route('profile-address-update',$address->ma_id) }}" method="post" role="form" id="valid-form" class="form-border">
@csrf
@method('patch')
<div class="row">

<div class="section-title">
<h2>Update Address</h2>
</div>

<div class="form-group mt-3">
  <label class="labelcoz">Address</label>
<input type="text" name="address" value="{{ $address->address }}" class="form-control" placeholder="Address">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz">Longitude  <a href="">Google Map Reference</a></label>
<input type="text" class="form-control" name="longitude" value="{{ $address->longt }}" placeholder="Longitude">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz">Latitude</label>
<input type="text" class="form-control" name="latitude" value="{{ $address->latt }}" placeholder="Latitude">
<div class="validate"></div>
</div>

<div class="text-left"><br><button type="submit" class="btn btn-primary btn-block">Upadate</button></div>                
</form>

@endsection
@section('merchantjs')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-address.js') }}"></script>
@endsection
