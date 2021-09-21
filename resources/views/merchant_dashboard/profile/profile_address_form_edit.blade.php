@extends('layouts.merchant-app')

@section('content')

<section class="content">
      <div class="container-fluid">

<div class="row">
  <div class="col-12">

    <div class="card">
    
      <div class="card-header">
        <h4 class="card-title">
          <a href="{{ route('profile_index') }}"><i class="nav-icon far fa-address-card aria-hidden="></i> Profile</a>  
          / <small>Update contact address</small>
        </h4>
      </div>


<form action="{{ route('profile_address_update',$address->id) }}" method="post" role="form" id="valid-form" class="form-border">
  @csrf

<div class="card-body"> 

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Address
    <small class="text-danger has-error">
      {{ $errors->has('address') ?  $errors->first('address') : '' }}
    </small>
  </label>
<textarea class="form-control" name="address" rows="2" placeholder="New address">{{ old('address',$address->address) }}</textarea>
</div>
  

        
</div>

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Update</button>
</div>

</form>
        

    </div>
  </div>
</div>


</div>
</section>



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
