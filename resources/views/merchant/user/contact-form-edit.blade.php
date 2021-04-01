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
<form action="{{ route('profile-contact-update',$contacts->mc_id) }}" method="post" role="form" id="valid-form" class="form-border">
@csrf
@method('patch')
<div class="row">

<div class="section-title">
<h2>Add Contact</h2>
</div>

<div class="form-group mt-3">
  <label class="labelcoz">First Name</label>
<input type="text" class="form-control" name="fname" value="{{ $contacts->fname}}" placeholder="First Name">
<input type="hidden" class="form-control" name="prof_id" value="{{ $gatemerchant_prof[0]->profid }}">
<div class="validate"></div>
</div>

<div class="form-group mt-3">
<label class="labelcoz">Last Name</label>
<input type="text" class="form-control" name="lname" value="{{ $contacts->lname }}" placeholder="Last Name">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz">E-mail</label>
<input type="text" class="form-control" name="email" value="{{ $contacts->email }}" placeholder="E-mail">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz">Mobile No. <b>Ex: 09107788999</b></label>
<input type="text" class="form-control" name="mobileno" value="{{ $contacts->phonno }}" placeholder="Mobile Number">
<div class="validate"></div>
</div>

<div class="text-left"><br><button type="submit" class="btn btn-primary btn-block">Update</button></div>                
</form>

@section('merchantjs')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-contact.js') }}"></script>
@endsection
@endsection
