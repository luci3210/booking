@extends('layouts.tourismo.ui')
@section('merchant')

<style type="text/css">
  /*select2*/
  .select2-container--default .select2-selection--multiple {
    border: 1px solid #e5e5e5 !important;
    border-radius: 0px !important;
    font-size: 14px;
    padding: 3px 0 2px 2px;
  }
  .select2-results__option {
    font-size: 14px;
    border: 1px solid #fff;
  }
    /*endselect2*/
  .btn-save {
    margin:20px 0 20px;
  }

</style>

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.js" integrity="sha512-1icA56H/QfnWMmygJLor4dORvI+7Kurg9CfXSDeJmyMJQL98LfPRk/UwCmi7NoZwbUwxMoI0tc2gJqG/Uu+ecA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="col-lg-3">
    @include('layouts.tourismo.menu')
</div>

<div class="col-lg-9">
<form action="{{ route('service_tour_submit') }}" method="post" role="form" enctype="multipart/form-data" class="cls-profile">
  @csrf


<div class="row row-margin">
<div class="section-title" style="padding-bottom: 35px;">
<h2 style="margin-top: -20px;">Service - Tour and Package</h2>
</div>

  <div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Tour Package Name</label>
  <input type="text" class="uk-input" name="tour_name" id="tour_name" placeholder="Tour Package Name">
  <div class="validate"></div>
</div>


<div class="col-md-3 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Price (Php)</label>
  <input type="text" name="price" id="currency-field" value="" data-type="currency" class="uk-input" placeholder="Price" data-rule="minlen:5">
  <input type="hidden" name="service_id" value="{{ $product->productid }}">
  <div class="validate"></div>
</div>


<div class="col-md-3 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Number of Night </label>
  <input type="text" class="uk-input" name="numnight" id="numnight" placeholder="Number of Night">
  <div class="validate"></div>
</div>

<div class="col-md-3 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Number of Guest (MAX)</label>
  <input type="text" name="numguest" class="uk-input" id="numguest" placeholder="Number of Guest">
  <div class="validate"></div>
</div>

<div class="col-md-3 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Quantity(Inventory)</label>
  <input type="text" name="qty" class="uk-input" id="qty" placeholder="Quantity">
  <div class="validate"></div>
</div>



<div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Tour Package Description</label>
  <textarea class="uk-textarea" name="tour_desc" id='tour_desc' rows="3" placeholder="Tour Package Description"rows="5"></textarea>
  <div class="validate"></div>
</div>

<div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> What to expect</label>
  <textarea class="uk-textarea" name="tour_expect" id='tour_expect' rows="8" placeholder="Tour Package Description"rows="5"></textarea>
  <div class="validate"></div>
</div>



<div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Cancelation and Refund Policy </label>
  <textarea class="uk-textarea" name="can_ref_policy" id='can_ref_policy' rows="3" placeholder="Please indicate your Cancelation and Refund Policy"rows="5"></textarea>
  <div class="validate"></div>
</div>


<div class="col-md-12 mt-5">
  <ul uk-tab>
    <li class="uk-active"><a href=""><b>Inclusion</b></a></li>
  </ul>
</div>

<div class="col-md-12 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Facilities </label>
  <select class="building uk-select" name="building[]" multiple="multiple">
    <option value="" disabled="true">-Select building facilities-</option>
    @foreach($building_facilities as $list)
    <option value="{{ $list->name }}">{{ $list->name }}</option>
    @endforeach
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-12 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Package </label>
  <select class="package uk-select" name="package[]" multiple="multiple">
    <option value="" disabled="true">-Select packages-</option>
    @foreach($packages as $list)
    <option value="{{ $list->name }}">{{ $list->name }}</option>
    @endforeach
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-12 mt-5">
  <ul uk-tab>
    <li class="uk-active"><a href=""><b>Location and Address</b> </a></li>
  </ul>
</div>

<div class="col-md-12 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Address </label>
    <select class="uk-select" name="address">
      <option value="" disabled="true" selected="-Select address-">-Select address-</option>
      @foreach($address as $list)
      <option value="{{ $list->id }}">{{ $list->address }}</option>
      @endforeach
    </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Country </label>
  <select class="uk-select" name="country" id="countryid">
    <option value="" disabled="true" selected="-Select country-">-Select country-</option>
    @foreach($country as $list)
    <option value="{{ $list->id }}">{{ $list->country }}</option>
    @endforeach
  </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Region </label>
  <select class="uk-select" name="region" id="regionid">
    <option value="0" disabled="true" selected="true">-Select Region-</option>
  </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> District </label>
    <select class="uk-select" name="district" id="districtid">
    <option value="0" disabled="true" selected="true">-Select District-</option>
  </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> City </label>
  <select class="uk-select" name="city" id="cityid">
    <option value="0" disabled="true" selected="true">-Select City-</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Municipality </label>
  <select class="uk-select" name="municipality" id="municipalityid">
    <option value="0" disabled="true" selected="true">-Select Municipality-</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Barangay </label>
    <select class="uk-select" name="barangay" id="barangayid">
    <option value="0" disabled="true" selected="true">-Select Barangay-</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-12 mt-5">
  <hr class="uk-divider-icon">
</div>

<div class="col-md-12 mt-2">
  <ul uk-tab>
    <li class="uk-active"><a href=""><b>Application For Exclusive</b> </a></li>
  </ul>
</div>

<div class="col-md-4 form-group mt-1">
<label class="labelcoz"><span class="uk-text-danger">*</span> Price (Php)</label>
  <input type="text" name="exclusive_price" id="currency-field" value="" data-type="currency" class="uk-input" placeholder="Price" data-rule="minlen:5">
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Date Start</label>
  <input type="text" name="exclusive_date_start" class="uk-input" id="date_start" placeholder="mm/dd/yyyy">
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Date End</label>
  <input type="text" name="exclusive_date_end" class="uk-input" id="date_end" placeholder="mm/dd/yyyy">
  <div class="validate"></div>
</div>


<div class="col-md-12 form-group mt-3">
  <label class="labelcoz">
    Upload Image
  </label>
  <input type="file" name="file" class="form-control-file">
</div>


<div class="col-md-12 form-group mt-3">
  <label class="labelcoz">
    <input class="uk-checkbox" name="exclusive" value="1" type="checkbox">&nbsp;&nbsp; Please Confim. 
  </label>
</div>
            

<div class="col-md-12 mt-3">
  <ul uk-tab>
    <li class="uk-active"><a href=""><b>Upload photos</b></a></li>
  </ul>
</div>

<div class="col-md-12 form-group mt-3">
      {!! csrf_field() !!}
          <div class="file-loading">
              <input id="file-1" type="file" name="file" multiple class="file" data-min-file-count="2">
          </div>
</div>

<p style="color: #fe0000; margin-top: 25px;"><b>* Note!! </b> Please upload first photos before you submit the page.</p>
<button type="submit" class="uk-button uk-button-primary btn-save">Submit</button>
</div>
</form>

  </div>
</div>
</div>

</section>

@endsection
@section('merchantjs')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-contact.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-address.js') }}"></script>

<!-- 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  -->
<script src="{{ asset('ijaboCropTool-master/ijaboCropTool.min.js') }}"></script> 
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script>
       $('#file').ijaboCropTool({
          preview : '.image-previewer',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("profile-pic-crop") }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });
</script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.0/js/fileinput.min.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/themes/fa/theme.min.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "{{ route('tour_photos') }}",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),

                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            initialCaption: "Please upload GreaterThan 1 and LessThan 10 photos",
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });
    </script>

    </script>

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

<script type="text/javascript">

  $("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "" + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

</script>
@endsection
