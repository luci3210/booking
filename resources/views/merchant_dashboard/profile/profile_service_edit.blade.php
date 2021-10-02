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
<input type="text" name="country" value="{{ old('country',$data->ps_country) }}" class="form-control" placeholder="Country">
</div>

<div class="form-group col-4">
  <label>
    <span class="text-danger">*</span>  Province
    <small class="text-danger has-error">
      {{ $errors->has('provice') ?  $errors->first('provice') : '' }}
    </small>
  </label>
<input type="text" name="provice" value="{{ old('provice',$data->ps_district) }}" class="form-control" placeholder="Province">
</div>

<div class="form-group col-4">
  <label>
    City / Municipality
    <small class="text-danger has-error">
      {{ $errors->has('city') ?  $errors->first('city') : '' }}
    </small>
  </label>
<input type="text" name="city" value="{{ old('City',$data->ps_city) }}" class="form-control" placeholder="city">
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
<textarea class="form-control" name="facilities" rows="3" placeholder="Most Popular Facilities">
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
<textarea class="form-control" name="cico" rows="3" placeholder="Check In - Check Out Policy">{{ old('cico',$data->ps_check_in_out) }}</textarea>
</div>



<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> Children & Extra Bed Policy and Other
    <small class="text-danger has-error">
      {{ $errors->has('extra') ?  $errors->first('extra') : '' }}
    </small>
  </label>
<textarea class="form-control" name="extra" rows="3" placeholder="Children & Extra Bed Policy and Other">{{ old('extra',$data->ps_roles_desc) }}</textarea>
</div>

<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> Attractions
    <small class="text-danger has-error">
      {{ $errors->has('attraction') ?  $errors->first('attraction') : '' }}
    </small>
  </label>
<textarea class="form-control" name="attraction" rows="3" placeholder="Attraction">{{ old('attraction',$data->ps_attraction) }}</textarea>
</div>

</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Cancellation/Payment Policy
    <small class="text-danger has-error">
      {{ $errors->has('cpp') ?  $errors->first('cpp') : '' }}
    </small>
  </label>
<textarea class="form-control" name="cpp" rows="2" placeholder="Cancellation/Prepayment Policy">{{ old('cpp',$data->ps_cancelaton_ref) }}</textarea>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

$('.selectservices').select2( {
  allowClear:true
});
</script>
@endsection()
