@extends('layouts.merchant-app')

@section('content')

<section class="content">
<div class="container-fluid">


<div class="row">
  <div class="col-12">

    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title"><i class="fas"></i> {{ $data->name}}</h3>
      </div>


<form action="{{ route('sp_m_update',$data->ps_id) }}" method="post" role="form" id="valid-form">
  @csrf

<div class="card-body"> 

<div class="form-group">
  <label>
  <span class="text-danger">*</span> Hotel Name
    <small class="text-danger has-error">
      {{ $errors->has('hotel_name') ?  $errors->first('hotel_name') : '' }}
    </small>
  </label>
<input type="text" name="hotel_name" class="form-control" value="{{ old('hotel_name',$data->ps_name )}}" placeholder="Hotel Name">
</div>
      

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Description
    <small class="text-danger has-error">
      {{ $errors->has('description') ?  $errors->first('description') : '' }}
    </small>
  </label>
<textarea class="form-control" name="description" rows="2" placeholder="Description">{{ old('description',$data->ps_description) }}</textarea>
</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Address
    <small class="text-danger has-error">
      {{ $errors->has('address') ?  $errors->first('address') : '' }}
    </small>
  </label>
<textarea class="form-control" name="address" rows="1" placeholder="Address">{{ old('address',$data->ps_address) }}</textarea>
</div>


<div class="row">

<div class="form-group col-4">
  <label>
    <span class="text-danger">*</span> Country
    <small class="text-danger has-error">
      {{ $errors->has('country') ?  $errors->first('country') : '' }}
    </small>
  </label>
  <select class="custom-select" name="country" id="countryid">
    <option value="" disabled="true" selected="-Select country-">-Select country-</option>
      @forelse($select_country as $countries)
        <option value="{{ $countries->id }}">{{ $countries->country }}</option>
      @empty
        <option value="" disabled="true">Country list not available </option>
      @endforelse
      </select>
</div>

<div class="form-group col-4">
  <label>
    <span class="text-danger">*</span>  Province
    <small class="text-danger has-error">
      {{ $errors->has('provice') ?  $errors->first('provice') : '' }}
    </small>
  </label>
  <select class="custom-select" name="provice" id="districtid">
    <option value="0" disabled="true" selected="true">-Select Province-</option>
  </select>
</div>

<div class="form-group col-4">
  <label>
    City / Municipality
    <small class="text-danger has-error">
      {{ $errors->has('city') ?  $errors->first('city') : '' }}
    </small>
  </label>
<select class="custom-select" name="city" id="cityid">
    <option value="0" disabled="true" selected="true">-Select Place-</option>
  </select>
</div>

</div>



<div class="row">
<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> Most Popular Facilities
    <small class="text-danger has-error">
      {{ $errors->has('facilities') ?  $errors->first('facilities') : '' }}
    </small>
  </label>
<textarea class="form-control" name="facilities" rows="3" id="facilities-textarea"placeholder="Most Popular Facilities">
  {{ old('facilities',$data->ps_facilities) }}
</textarea>
</div>

<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> Check In - Check Out Policy
    <small class="text-danger has-error">
      {{ $errors->has('cico') ?  $errors->first('cico') : '' }}
    </small>
  </label>
<textarea class="form-control" name="cico" rows="3" id="cico-textarea" placeholder="Check In - Check Out Policy">{{ old('cico',$data->ps_check_in_out) }}</textarea>
</div>



<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> Children & Extra Bed Policy and Other
    <small class="text-danger has-error">
      {{ $errors->has('extra') ?  $errors->first('extra') : '' }}
    </small>
  </label>
<textarea class="form-control" name="extra" rows="3" id="extra-textarea" placeholder="Children & Extra Bed Policy and Other">{{ old('extra',$data->ps_roles_desc) }}</textarea>
</div>

<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> Attractions
    <small class="text-danger has-error">
      {{ $errors->has('attraction') ?  $errors->first('attraction') : '' }}
    </small>
  </label>
<textarea class="form-control" name="attraction" rows="3" id="attraction-textarea" placeholder="Attraction">{{ old('attraction',$data->ps_attraction) }}</textarea>
</div>

</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Cancellation/Payment Policy
    <small class="text-danger has-error">
      {{ $errors->has('cpp') ?  $errors->first('cpp') : '' }}
    </small>
  </label>
<textarea class="form-control" name="cpp" rows="2" id="cpp-textarea" placeholder="Cancellation/Prepayment Policy">{{ old('cpp',$data->ps_cancelaton_ref) }}</textarea>
</div>


<div class="form-group">
  <label>
    Status Service
    <small class="text-danger has-error">
    </small>
  </label>
<select class="custom-select" name="status" id="cityid">
    <option value="" disabled="true" selected="true">-Select staus -</option>
    <option value="1" selected="true">Enabled</option>
    <option value="5" >Disable</option>
  </select>
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

@endsection

@section('merchantjs')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

$('.selectservices').select2( {
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

<script>

    ClassicEditor
        .create( document.querySelector('#facilities-textarea') )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector('#cico-textarea') )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector('#extra-textarea') )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector('#attraction-textarea') )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
      .create( document.querySelector('#cpp-textarea') )
      .catch( error => {
          console.error( error );
      } );

</script>

@endsection()
