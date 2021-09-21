@extends('layouts.merchant-app')

@section('content')

<section class="content">
      <div class="container-fluid">

<div class="row">
  <div class="col-12">

    <div class="card card-outline card-info">
    
      <div class="card-header">
        <h4 class="card-title">
          <a href="{{ route('profile_index') }}"><i class="nav-icon far fa-address-card aria-hidden="></i> Profile</a>  
          / <small>Add new contact address</small>
        </h4>
      </div>


<form action="{{ route('profile_address_form_update') }}" method="post">
  @csrf

<div class="card-body"> 

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Address
    <small class="text-danger has-error">
      {{ $errors->has('address') ?  $errors->first('address') : '' }}
    </small>
  </label>
<textarea class="form-control" name="address" rows="2" placeholder="About"></textarea>
</div>



        
</div>

<div class="card-footer">
  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
</div>

</form>
        

    </div>
  </div>
</div>


</div>
</section>

@endsection
