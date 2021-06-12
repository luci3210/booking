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
      

<div class="row">
  <div class="col-12">

    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title">Merchant Contact Form</h3>
      </div>


<form action="{{ route('profile_contact_update',$contact->id) }}" method="post" role="form" id="valid-form" class="form-border">
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
<input type="text" name="fname" value="{{ $contact->fname }}" class="form-control" placeholder="First Name">
</div>


<div class="form-group col-6">
  <label>
    Last Name
    <small class="text-danger has-error">
      {{ $errors->has('lname') ?  $errors->first('lname') : '' }}
    </small>
  </label>
<input type="text" name="lname" value="{{ $contact->lname }}" class="form-control" placeholder="Last Name">
</div>


<div class="form-group col-6">
  <label>
    <span class="text-danger">*</span> E-mail Address
    <small class="text-danger has-error">
      {{ $errors->has('email') ?  $errors->first('email') : '' }}
    </small>
  </label>
<input type="text" name="email" value="{{ $contact->email }}" class="form-control" placeholder="E-mail Address">
</div>


<div class="form-group col-6">
  <label>
    Contact No.
    <small class="text-danger has-error">
      {{ $errors->has('contact') ?  $errors->first('contact') : '' }}
    </small>
  </label>
<input type="text" name="contact" value="{{ $contact->phonno }}" class="form-control" placeholder="Contact No.">
</div>

</div>

        
</div>

<div class="card-footer">
  <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Update</button>
</div>

</form>
        

    </div>
  </div>
</div>



</div>
</section>

@endsection
