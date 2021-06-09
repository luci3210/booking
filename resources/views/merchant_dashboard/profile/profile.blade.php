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

            </div>
          </div>
          
          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h4>44</h4>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h4>65</h4>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
        </div>
        


@if(empty($profile->user_id))

<div class="row">
  <div class="col-12">

    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title">Merchant Profile</h3>
      </div>


<form action="{{ route('profile_submit') }}" method="post" role="form" id="valid-form" class="form-border">
  @csrf

<div class="card-body"> 


<div class="form-group">
  <label>
  <span class="text-danger">*</span> Merchant Name
    <small class="text-danger has-error">
      {{ $errors->has('merchant_name') ?  $errors->first('merchant_name') : '' }}
    </small>
  </label>
<input type="text" name="merchant_name" value="" class="form-control"placeholder="Merchant Name">
</div>
      


<div class="form-group">
  <label>
    <span class="text-danger">*</span> About
    <small class="text-danger has-error">
      {{ $errors->has('about') ?  $errors->first('about') : '' }}
    </small>
  </label>
<textarea class="form-control" name="about" rows="3" placeholder="About"></textarea>
</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Merchant Main Address
    <small class="text-danger has-error">
      {{ $errors->has('merchant_address') ?  $errors->first('merchant_address') : '' }}
    </small>
  </label>
<input type="text" name="merchant_address" value="" class="form-control" placeholder="Merchant address">
</div>

<div class="row">

<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> Email
    <small class="text-danger has-error">
      {{ $errors->has('mail') ?  $errors->first('mail') : '' }}
    </small>
  </label>
<input type="text" name="mail" value="" class="form-control" placeholder="E-mail">
</div>


<div class="form-group col-6">
  <label>
    Website
    <small class="text-danger has-error">
      {{ $errors->has('website') ?  $errors->first('website') : '' }}
    </small>
  </label>
<input type="text" name="website" value="" class="form-control" placeholder="Website">
</div>


<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span>  Telephone No. / Mobile No
    <small class="text-danger has-error">
      {{ $errors->has('telno') ?  $errors->first('telno') : '' }}
    </small>
  </label>
<input type="text" name="telno" value="" class="form-control" placeholder="Telephone No. / Mobile No">
</div>


</div>

        
</div>

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Update</button>
</div>

</form>
        

    </div>
  </div>
</div>

@else 


<div class="row">
  <div class="col-12">

    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title">Merchant Profile Update</h3>
      </div>


<form action="{{ route('profile_update') }}" method="post" role="form" id="valid-form" class="form-border">
  @csrf

<div class="card-body"> 


<div class="form-group">
  <label>
  <span class="text-danger">*</span> Merchant Name
    <small class="text-danger has-error">
      {{ $errors->has('merchant_name') ?  $errors->first('merchant_name') : '' }}
    </small>
  </label>
<input type="text" name="merchant_name" value="{{ $profile_details->company }}" class="form-control"placeholder="Merchant Name">
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


<div class="form-group">
  <label>
    <span class="text-danger">*</span> Merchant Main Address
    <small class="text-danger has-error">
      {{ $errors->has('merchant_address') ?  $errors->first('merchant_address') : '' }}
    </small>
  </label>
<textarea class="form-control" name="merchant_address" rows="3" placeholder="About">{{ $profile_details->address }}</textarea>
</div>





<div class="row">

<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> Email
    <small class="text-danger has-error">
      {{ $errors->has('mail') ?  $errors->first('mail') : '' }}
    </small>
  </label>
<input type="text" name="mail" value="{{ $profile_details->email }}" class="form-control" placeholder="E-mail">
</div>


<div class="form-group col-6">
  <label>
    Website
    <small class="text-danger has-error">
      {{ $errors->has('website') ?  $errors->first('website') : '' }}
    </small>
  </label>
<input type="text" name="website" value="{{ $profile_details->website }}" class="form-control" placeholder="Website">
</div>


<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span>  Telephone No. / Mobile No
    <small class="text-danger has-error">
      {{ $errors->has('telno') ?  $errors->first('telno') : '' }}
    </small>
  </label>
<input type="text" name="telno" value="{{ $profile_details->telno }}" class="form-control" placeholder="Telephone No. / Mobile No">
</div>


</div>

        
</div>

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Update</button>
</div>

</form>
        

    </div>
  </div>
</div>


@endif

</div>
</section>

@endsection
