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
<form action="{{ route('profile-address-add') }}" method="post" role="form" id="valid-form" class="form-border">
@csrf
<div class="row row-margin">


<div class="col-md-12 mt-3">
<ul class="uk-breadcrumb">

<li><a href="#" class="a-m-link-default">Merchant</a></li>
<li><a href="#" class="a-m-link {{ (request()->is('create_address')) ? 'a-m-active' : '' }}">Profile</a></li>
<li><a href="{{ route('create_address') }}" class="a-m-link {{ (request()->is('merchant/profile/address')) ? 'a-m-active' : '' }}">Address</a></li>
<li><a href="#" class="a-m-link">contact</a></li>

</ul>
</div>


<div class="form-group mt-3">
<label class="labelcoz">Address</label>
<input type="text" name="address" class="uk-input" placeholder="Address">
<div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Country </label>
  <select class="uk-select" name="country" id="countryid">
    <option value="" disabled="true" selected="-Select country-">-Select country-</option>
    @foreach($country as $list)
    <option value="{{ $list->id }}">{{ $list->country }}</option>
    @endforeach
  </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Region </label>
  <select class="uk-select" name="region" id="regionid">
    <option value="0" disabled="true" selected="true">-Select Region-</option>
  </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> District </label>
    <select class="uk-select" name="district" id="districtid">
    <option value="0" disabled="true" selected="true">-Select District-</option>
  </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> City </label>
  <select class="uk-select" name="city" id="cityid">
    <option value="0" disabled="true" selected="true">-Select City-</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Municipality </label>
  <select class="uk-select" name="municipality" id="municipalityid">
    <option value="0" disabled="true" selected="true">-Select Municipality-</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Barangay </label>
    <select class="uk-select" name="barangay" id="barangayid">
    <option value="0" disabled="true" selected="true">-Select Barangay-</option>
  </select>
  <div class="validate"></div>
</div>



<div class="text-left"><br><button type="submit" class="btn btn-primary btn-block">Save</button></div>                
</form>

@endsection
@section('merchantjs')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-address.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
// select2
$('.room').select2( {
  allowClear:true
});

$('.building').select2( {
  allowClear:true
});

$('.package').select2( {
  allowClear:true
});
// endselect2

//location
$(document).ready(function () {
      
$('#countryid').on('change', function () {

        let id = $(this).val();
        
        $('#regionid').empty();
        $('#regionid').append(`<option value="0" disabled selected>Searching . . .</option>`);
        $.ajax( {
           type: 'GET',
           url: '/merchant/location/region/select/' + id,
           
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            
            $('#regionid').empty();
      
            $('#regionid').append(`<option value="0" disabled selected>-Select Region-</option>`);
            response.forEach(element => {
            $('#regionid').append(`<option value="${element['id']}">${element['region']}</option>`);
          });
      
      }
  });
});


$('#regionid').on('change', function () {

        let id = $(this).val();
        
        $('#districtid').empty();
        $('#districtid').append(`<option value="0" disabled selected>Searching . . .</option>`);
        $.ajax( {
           type: 'GET',
           url: '/merchant/location/district/select/' + id,
           
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            
            $('#districtid').empty();
      
            $('#districtid').append(`<option value="0" disabled selected>-Select Region-</option>`);
            response.forEach(element => {
            $('#districtid').append(`<option value="${element['id']}">${element['district']}</option>`);
          });
      
      }
  });
});


$('#districtid').on('change', function () {

        let id = $(this).val();
        
        $('#cityid').empty();
        $('#cityid').append(`<option value="0" disabled selected>Searching . . .</option>`);
        $.ajax( {
           type: 'GET',
           url: '/merchant/location/city/select/' + id,
           
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            
            $('#cityid').empty();
      
            $('#cityid').append(`<option value="0" disabled selected>-Select Region-</option>`);
            response.forEach(element => {
            $('#cityid').append(`<option value="${element['id']}">${element['city']}</option>`);
          });
      
      }
  });
});


$('#cityid').on('change', function () {

        let id = $(this).val();
        
        $('#municipalityid').empty();
        $('#municipalityid').append(`<option value="0" disabled selected>Searching . . .</option>`);
        $.ajax( {
           type: 'GET',
           url: '/merchant/location/municipality/select/' + id,
           
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            
            $('#municipalityid').empty();
      
            $('#municipalityid').append(`<option value="0" disabled selected>-Select Region-</option>`);
            response.forEach(element => {
            $('#municipalityid').append(`<option value="${element['id']}">${element['municipality']}</option>`);
          });
      
      }
  });
});



$('#municipalityid').on('change', function () {

        let id = $(this).val();
        
        $('#barangayid').empty();
        $('#barangayid').append(`<option value="0" disabled selected>Searching . . .</option>`);
        $.ajax( {
           type: 'GET',
           url: '/merchant/location/barangay/select/' + id,
           
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            
            $('#barangayid').empty();
      
            $('#barangayid').append(`<option value="0" disabled selected>-Select Region-</option>`);
            response.forEach(element => {
            $('#barangayid').append(`<option value="${element['id']}">${element['barangay']}</option>`);
          });
      
      }
  });
});

});

</script>
@endsection
