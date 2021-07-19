@extends('layouts.merchant-app')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
        
            <div class="small-box bg-info">
              <div class="inner">
                <h4>150</h4>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h4>53<sup style="font-size: 20px">%</sup></h4>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>44</h4>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>65</h4>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>


@if($service_name->name == 'Hotel')
  <form action="{{ route('service_listing_save_hotel',$service_name->id) }}" method="post">
@else
  <form action="{{ route('service_listing_save_post',$service_name->id) }}" method="post">
@endif




  @csrf
<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-box-open"></i> Service » {{ $service_name->name }} » 
            <a href="{{ route('service_listing_create_post',$service_name->description) }}" class="py-0">Create Post</a>
        </h3>
      </div>

    <div class="card-body">
        
@if($service_name->name == 'Hotel')

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Room Name
      <small class="text-danger has-error">
          {{ $errors->has('room_name') ?  $errors->first('room_name') : '' }}
      </small>
  </label>
  <input type="text" name="room_name" value="" class="form-control" placeholder="Room Name">
</div>

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Room Description
    <small class="text-danger has-error">
      {{ $errors->has('room_description') ?  $errors->first('room_description') : '' }}
    </small>
  </label>
  <textarea name="room_description" class="form-control" rows="2" placeholder="Room Description ..."></textarea>
</div>



@else 

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Tour Package Name
    <small class="text-danger has-error">
        {{ $errors->has('tour_package_name') ?  $errors->first('tour_package_name') : '' }}
    </small>
  </label>
  <input type="text" name="tour_package_name" value="" class="form-control" placeholder="Tour Package">
</div>

@endif

<div class="row">
  <div class="form-group col-3">
    <label>
      <span class="text-danger">*</span> Price (Php)
      <small class="text-danger has-error">
        {{ $errors->has('price') ?  $errors->first('price') : '' }}
      </small>
    </label>
  <input type="text" name="price" value="" id="currency-field" data-type="currency" class="form-control" placeholder="Price" data-rule="minlen:5">
  </div>


<div class="form-group col-3">
  <label>
    <span class="text-danger">*</span> No. of Night
      <small class="text-danger has-error">
        {{ $errors->has('no_night') ?  $errors->first('no_night') : '' }}
      </small>
  </label>
<input type="text" name="no_night" value="" class="form-control" placeholder="Number of Night">
</div>


<div class="form-group col-3">
  <label>
    <span class="text-danger">*</span> No. of Guest (Max)
    <small class="text-danger has-error">
      {{ $errors->has('no_guest') ?  $errors->first('no_guest') : '' }}
    </small>
  </label>
<input type="text" name="no_guest" value="" class="form-control" placeholder="Number of Guest">
</div>


<div class="form-group col-3">
  <label>
    <span class="text-danger">*</span> Quantity (Inventory)
    <small class="text-danger has-error">
      {{ $errors->has('quantity') ?  $errors->first('quantity') : '' }}
    </small>
  </label>
<input type="text" name="quantity" value="" class="form-control" placeholder="Quantity">
</div>
</div>

@if($service_name->name == 'Hotel')

<div class="row">
  
  <div class="form-group col-4">
    <label>
      <span class="text-danger">*</span> Room Size
      <small class="text-danger has-error">
        {{ $errors->has('room_size') ?  $errors->first('room_size') : '' }}
      </small>
    </label>
  <input type="text" name="room_size" value=""  class="form-control" placeholder="Room Size">
  </div>


<div class="form-group col-4">
  <label>
    <span class="text-danger">*</span> View
    <small class="text-danger has-error">{{ $errors->has('views') ?  $errors->first('views') : '' }}</small>
  </label>
  <select class="custom-select" name="views">
      <option value="" selected="selected" disabled="true">-Select View-</option>
        
      <option value="City View">City View</option>
      <option value="Forest View">Forest View</option>
      <option value="Seaside View">Seaside View</option>

  </select>
</div>

<div class="form-group col-4">
  <label>
    <span class="text-danger">*</span> No. of Bed
    <small class="text-danger has-error">
      {{ $errors->has('number_bed') ?  $errors->first('number_bed') : '' }}
    </small>
  </label>
<input type="text" name="number_bed" value="" class="form-control" placeholder="Number of Bed">
</div>
</div>

@else

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Tour Package Description
    <small class="text-danger has-error">
      {{ $errors->has('tour_package_desc') ?  $errors->first('tour_package_desc') : '' }}
    </small>
  </label>
  <textarea name="tour_package_desc" class="form-control" rows="3" placeholder="Tour Package Description ..."></textarea>
</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> What to expect
    <small class="text-danger has-error">
      {{ $errors->has('what_expect') ?  $errors->first('what_expect') : '' }}
    </small>
  </label>
  <textarea name="what_expect" class="form-control" rows="3" placeholder="What to expect ...."></textarea>
</div>

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Cancelation and Refund Policy
    <small class="text-danger has-error">
      {{ $errors->has('cancelation') ?  $errors->first('cancelation') : '' }}
    </small>
  </label>
  <textarea name="cancelation" class="form-control" rows="3" placeholder="Cancelation and Refund Policy"></textarea>
</div>

@endif


<div  style="padding:5px 0px 5px;">
<hr>
<strong><i class="fas fa-list-ul"></i> Inclusion</strong>
</div>

@if($service_name->name == 'Hotel')

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Room Facilities
    <small class="text-danger has-error">{{ $errors->has('room_facilities') ?  $errors->first('room_facilities') : '' }}</small>
  </label>
  <select class="custom-select facilities" name="room_facilities[]" multiple="multiple">
      <option value="" disabled="true">-Select Room Facilities-</option>
        @foreach($room_facilities as $list)
      <option value="{{ $list->name }}">{{ $list->name }}</option>
        @endforeach
  </select>
</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Building Facilities
    <small class="text-danger has-error">{{ $errors->has('buiding_facilities') ?  $errors->first('buiding_facilities') : '' }}</small>
  </label>
  <select class="custom-select facilities" name="buiding_facilities[]" multiple="multiple">
      <option value="" disabled="true">-Select Building Facilities-</option>
        @foreach($building_facilities as $list)
      <option value="{{ $list->name }}">{{ $list->name }}</option>
        @endforeach
  </select>
</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Booking Packages
    <small class="text-danger has-error">{{ $errors->has('booking_package') ?  $errors->first('booking_package') : '' }}</small>
  </label>
  <select class="custom-select facilities" name="booking_package[]" multiple="multiple">
      <option value="" disabled="true">-Select Package-</option>
        @foreach($packages_facilities as $list)
      <option value="{{ $list->name }}">{{ $list->name }}</option>
        @endforeach
  </select>
</div>

@else

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Facilities
    <small class="text-danger has-error">{{ $errors->has('facilities') ?  $errors->first('facilities') : '' }}</small>
  </label>
  <select class="custom-select facilities" name="facilities[]" multiple="multiple">
      <option value="" disabled="true">-Select Facilities-</option>
        @foreach($building_facilities as $list)
      <option value="{{ $list->name }}">{{ $list->name }}</option>
        @endforeach
  </select>
</div>

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Packages
    <small class="text-danger has-error">{{ $errors->has('package') ?  $errors->first('package') : '' }}</small>
  </label>
  <select class="custom-select facilities" name="package[]" multiple="multiple">
      <option value="" disabled="true">-Select Package-</option>
        @foreach($packages_facilities as $list)
      <option value="{{ $list->name }}">{{ $list->name }}</option>
        @endforeach
  </select>
</div>


@endif

<div  style="padding:5px 0px 5px;">
<hr>
<strong> <i class="fas fa-map-marked-alt"></i> Location and Address</strong>
</div>


@if($service_name->name == 'Hotel')

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Address
    <small class="text-danger has-error">{{ $errors->has('address') ?  $errors->first('address') : '' }}</small>
  </label>
  <select class="custom-select" name="address">
      <option value="" disabled="true">-Select address-</option>
        @foreach($address as $list)
      <option value="{{ $list->id }}">{{ $list->address }}</option>
        @endforeach
  </select>
</div>

@else

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Address
    <small class="text-danger has-error">
      {{ $errors->has('address') ?  $errors->first('address') : '' }}
    </small>
  </label>
  <textarea name="address" class="form-control" rows="2" placeholder="Address...."></textarea>
</div>

@endif

<div class="row">



<div class="col-md-4 form-group">
  <label><span class="text-danger">*</span> Country
  <small class="text-danger has-error">
    {{ $errors->has('country') ?  $errors->first('country') : '' }}
  </small> 
  </label>
  <select class="custom-select" name="country" id="countryid">
    <option value="" disabled="true" selected="-Select country-">-Select country-</option>
    @foreach($country as $list)
    <option value="{{ $list->id }}">{{ $list->country }}</option>
    @endforeach
  </select>
</div>


<div class="col-md-4 form-group">
  <label>
    <span class="text-danger">*</span> Province 
    <small class="text-danger has-error">
      {{ $errors->has('province') ?  $errors->first('province') : '' }}
    </small>
  </label>
    <select class="custom-select" name="province" id="districtid">
    <option value="0" disabled="true" selected="true">-Select Province-</option>
  </select>
</div>

<div class="col-md-4 form-group">
  <label><span class="text-danger">*</span> Place
    <small class="text-danger has-error">
      {{ $errors->has('place') ?  $errors->first('place') : '' }}
    </small>
  </label>
  <select class="custom-select" name="place" id="cityid">
    <option value="0" disabled="true" selected="true">-Select Place-</option>
  </select>
  <div class="validate"></div>
</div>

</div>



















</div>
        
<div class="card-footer">
  <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Submit</button>
</div>


    </div>
  </div>

</div>

</form>



</div>


</section>

@endsection
@section('merchantjs')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.0/js/fileinput.min.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/themes/fa/theme.min.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

$('.facilities').select2( {
  allowClear:true
});



$(document).ready(function () {
      
$('#countryid').on('change', function () {

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
      
            $('#districtid').append(`<option value="0" disabled selected>-Select Provice-</option>`);
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