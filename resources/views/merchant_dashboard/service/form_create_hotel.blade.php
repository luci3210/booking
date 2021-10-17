@extends('layouts.merchant-app')
@section('third_party_stylesheets')
<style>
    .breadcrumb {
    margin-bottom: 0;
    background-color:#6C3483;
    }
    .breadcrumb  .breadcrumb-item {
      color: #BB8FCE;
    }
    .breadcrumb a{
      color: #fff;
    }
    .breadcrumb a:hover {
     color: #BB8FCE; 
    }
</style>
@endsection
@section('content')

<section class="content">
  <div class="container-fluid">

  <div class="row">
    <div class="col-12">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-home"></i></a></li>
      <li class="breadcrumb-item"><a href="#">Post Service</a></li>
      <li class="breadcrumb-item"><a href="{{ route('service_listing',$service_name->description) }}">Hotel</a></li>
      <li class="breadcrumb-item active" aria-current="page">Create Post</li>
    </ol>
    </nav>
    </div>
  </div>

  <form action="{{ route('service_listing_save_hotel',$service_name->id) }}" method="post">

  @csrf
<div class="row">
  <div class="col-12">
    <div class="card mt-3">
    <div class="card-body">
        
<div class="form-group">
  <label>
    <span class="text-danger">*</span> Select Hotel
      <small class="text-danger has-error">
          {{ $errors->has('hotel') ?  $errors->first('hotel') : '' }}
      </small>
  </label>
  <select class="custom-select" name="hotel" id="hotel">
    <option value="" disabled="true" selected="-Select country-">-Select Hotel-</option>
      @forelse($hotel as $hotels)
        <option value="{{ $hotels->ps_id }}" {{ old('hotel') == $hotels->ps_id ? 'selected':'' }}>{{ $hotels->ps_name }} - Address: {{ $hotels->ps_address }}</option>
      @empty
        <option value="" disabled="true">Hotel list not available </option>
      @endforelse
      </select>
</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Room Name
      <small class="text-danger has-error">
          {{ $errors->has('room_name') ?  $errors->first('room_name') : '' }}
      </small>
  </label>
  <input type="text" name="room_name" value="{{ old('room_name') }}" class="form-control" placeholder="Room Name">
</div>

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Room Description
    <small class="text-danger has-error">
      {{ $errors->has('room_description') ?  $errors->first('room_description') : '' }}
    </small>
  </label>
  <textarea name="room_description" class="form-control" rows="2" id="description-textarea" placeholder="Room Description ...">{{ old('room_description') }}</textarea>
</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Room Amenities
    <small class="text-danger has-error">{{ $errors->has('room_facilities') ?  $errors->first('room_facilities') : '' }}</small>
  </label>
  <select class="custom-select facilities" name="room_facilities[]" multiple="multiple">
      <option value="" disabled="true">-Select Room Facilities-</option>
        @foreach($room_amenities as $list)
      <option value="{{ $list->name }}">{{ $list->name }}</option>
        @endforeach
  </select>
</div>

<div  style="padding:5px 0px 5px;">
<hr>

<div class="row">
  <div class="form-group col-6">
    <label>
      <span class="text-danger">*</span> Price (Php)
      <small class="text-danger has-error">
        {{ $errors->has('price') ?  $errors->first('price') : '' }}
      </small>
    </label>
  <input type="text" name="price" value="{{ old('price') }}" id="currency-field" data-type="currency" class="form-control" placeholder="Price" data-rule="minlen:5">
  </div>


<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> No. of Night
      <small class="text-danger has-error">
        {{ $errors->has('no_night') ?  $errors->first('no_night') : '' }}
      </small>
  </label>
<input type="text" name="no_night" value="{{ old('no_night') }}" class="form-control" placeholder="Number of Night">
</div>
</div>


<div class="row">
<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> No. of Guest (Max)
    <small class="text-danger has-error">
      {{ $errors->has('no_guest') ?  $errors->first('no_guest') : '' }}
    </small>
  </label>
<input type="text" name="no_guest" value="{{ old('no_guest') }}" class="form-control" placeholder="Number of Guest">
</div>


<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> Quantity (Inventory)
    <small class="text-danger has-error">
      {{ $errors->has('quantity') ?  $errors->first('quantity') : '' }}
    </small>
  </label>
<input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" placeholder="Quantity">
</div>
</div>


<div class="row">
  
  <div class="form-group col-4">
    <label>
      <span class="text-danger">*</span> Room Size
      <small class="text-danger has-error">
        {{ $errors->has('room_size') ?  $errors->first('room_size') : '' }}
      </small>
    </label>
  <input type="text" name="room_size" value="{{ old('room_size') }}"  class="form-control" placeholder="Room Size">
  </div>


<div class="form-group col-4">
  <label>
    <span class="text-danger">*</span> View
    <small class="text-danger has-error">{{ $errors->has('views') ?  $errors->first('views') : '' }}</small>
  </label>
  <select class="custom-select" name="views">
      <option value="" selected="selected" disabled="true">-Select View-</option>
        
      <option value="City View" {{ old('views') == 'City View' ? 'selected':'' }}>City View</option>
      <option value="Forest View" {{ old('views') == 'Forest View' ? 'selected':'' }}>Forest View</option>
      <option value="Seaside View" {{ old('views') == 'Seaside View' ? 'selected':'' }}>Seaside View</option>

  </select>
</div>

<div class="form-group col-4">
  <label>
    <span class="text-danger">*</span> No. of Bed
    <small class="text-danger has-error">
      {{ $errors->has('number_bed') ?  $errors->first('number_bed') : '' }}
    </small>
  </label>
<input type="text" name="number_bed" value="{{ old('number_bed') }}" class="form-control" placeholder="Number of Bed">
</div>
</div>

</div>





</div>
        
<div class="card-footer">
  <button type="submit" class="btn btn-info">Continue <i class="fas fa-chevron-circle-right"></i></button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

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

    ClassicEditor
        .create( document.querySelector('#description-textarea') )
        .catch( error => {
            console.error( error );
        } );

</script>
@endsection