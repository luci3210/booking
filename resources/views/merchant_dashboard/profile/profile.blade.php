@extends('layouts.merchant-app')

@section('content')

<section class="content">
<div class="container-fluid">


<div class="row">
  <div class="col-12">

    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title">Profile Update</h3>
      </div>


<form action="{{ route('profile_update',$profile_details->id) }}" method="post" role="form" id="valid-form">
  @csrf

<div class="card-body"> 

<div class="form-group">
  <label>
  <span class="text-danger">*</span> Merchant Name
    <small class="text-danger has-error">
      {{ $errors->has('company') ?  $errors->first('company') : '' }}
    </small>
  </label>
<input type="text" name="company" value="{{ old('company',$profile_details->company) }}" class="form-control"placeholder="Merchant Name">
</div>
      

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Address
    <small class="text-danger has-error">
      {{ $errors->has('address') ?  $errors->first('address') : '' }}
    </small>
  </label>
<textarea class="form-control" name="address" rows="1" placeholder="Address">{{ $profile_details->address }}</textarea>
</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> About
    <small class="text-danger has-error">
      {{ $errors->has('about') ?  $errors->first('about') : '' }}
    </small>
  </label>
<textarea class="form-control" name="about" rows="3" placeholder="About">{{ $profile_details->about }}</textarea>
</div>


<div class="row">

<div class="form-group col-4">
  <label>
    <span class="text-danger">*</span> E-mail
    <small class="text-danger has-error">
      {{ $errors->has('email') ?  $errors->first('email') : '' }}
    </small>
  </label>
<input type="text" name="email" value="{{ old('email',$profile_details->email) }}" class="form-control" placeholder="E-mail">
</div>

<div class="form-group col-4">
  <label>
    <span class="text-danger">*</span>  Telephone No. / Mobile No
    <small class="text-danger has-error">
      {{ $errors->has('telno') ?  $errors->first('telno') : '' }}
    </small>
  </label>
<input type="text" name="telno" value="{{ old('telno',$profile_details->telno) }}" class="form-control" placeholder="Telephone No. / Mobile No">
</div>

<div class="form-group col-4">
  <label>
    Website
    <small class="text-danger has-error">
      {{ $errors->has('website') ?  $errors->first('website') : '' }}
    </small>
  </label>
<input type="text" name="website" value="{{ old('website',$profile_details->website) }}" class="form-control" placeholder="Website">
</div>

</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Services
    <small class="text-danger has-error">{{ $errors->has('services') ?  $errors->first('services') : '' }}</small>
  </label>
  <select class="custom-select selectservices" name="services[]" multiple="multiple" placehoder="">
      <option value="" disabled="true">-Select Room Facilities-</option>
        @foreach($services as $list)
      <option value="{{ $list->id }}">{{ old('services',$list->name) }}</option>
        @endforeach
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

$('.selectservices').select2( {
  allowClear:true
});
</script>
@endsection()
