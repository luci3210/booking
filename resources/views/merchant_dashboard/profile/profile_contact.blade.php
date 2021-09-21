@extends('layouts.merchant-app')

@section('content')

<section class="content">
      <div class="container-fluid">

<div class="row">
  <div class="col-12">

    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title">Merchant Contact Form</h3>
      </div>


<form action="{{ route('profile_contact_create') }}" method="post" role="form" id="valid-form" class="form-border">
  @csrf

<div class="card-body"> 

<div class="row">

<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> First Name
    <small class="text-danger has-error">
      {{ $errors->has('fname') ?  $errors->first('fname') : '' }}
    </small>
  </label>
<input type="text" name="fname" value="" class="form-control" placeholder="First Name">
</div>


<div class="form-group col-6">
  <label>
    Last Name
    <small class="text-danger has-error">
      {{ $errors->has('lname') ?  $errors->first('lname') : '' }}
    </small>
  </label>
<input type="text" name="lname" value="" class="form-control" placeholder="Last Name">
</div>


<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> E-mail Address
    <small class="text-danger has-error">
      {{ $errors->has('email') ?  $errors->first('email') : '' }}
    </small>
  </label>
<input type="text" name="email" value="" class="form-control" placeholder="E-mail Address">
</div>


<div class="form-group col-6">
  <label>
    Contact No.
    <small class="text-danger has-error">
      {{ $errors->has('contact') ?  $errors->first('contact') : '' }}
    </small>
  </label>
<input type="text" name="contact" value="" class="form-control" placeholder="Contact No.">
</div>

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
