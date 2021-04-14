@extends('layouts.tourismo.ui')
  @section('merchant')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  @endsection

@section('content')

<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

  <div class="col-lg-3">
    
  </div>



<div class="col-lg-9">

  @if(empty($merchant[0]->user_id))
<form action="{{ route('profile-save') }}" method="post" role="form" class="php-email-formx">
@else
<form action="{{ route('profile-update',$merchant[0]->id) }}" method="post" role="form" class="php-email-formx">

@method('patch')
@endif
@csrf

<div class="row">  

<div class="section-title">

<h2>Merchant Information</h2>
</div>

<div class="form-group mt-3">
@if(empty($merchant[0]->user_id))
<label class="labelcoz"><span class="uk-text-danger">*</span> Merchant Name</label>
<input type="text" class="uk-input" name="companyname" id="companyname" placeholder="Company Name">
@else
<label class="labelcoz">Merchant Name</label>
<input type="text" class="uk-input" name="companyname" id="companyname" value="{{ $merchant[0]->company }}" placeholder="Company Name">
@endif
<div class="validate"></div>
</div>

<div class="form-group mt-3">
@if(empty($merchant[0]->user_id))
<label class="labelcoz"><span class="uk-text-danger">*</span> Merchant Name</label>
<input type="text" class="uk-input" name="companyaddress" id="companyaddress" placeholder="Company Address">
@else
<label class="labelcoz">Merchant Address</span></label>
<input type="text" class="uk-input" name="companyaddress" id="companyaddress" value="{{ $merchant[0]->address }}" placeholder="Company Address">
@endif
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
@if(empty($merchant[0]->user_id))
<label class="labelcoz"><span class="uk-text-danger">*</span> E-meil</label>
<input type="text" class="uk-input" name="email" id="email" placeholder="E-mail">
@else
<label class="labelcoz">E-mail</label>
<input type="text" class="uk-input" name="email" id="email" value="{{ $merchant[0]->email }}" placeholder="E-mail">
@endif
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
@if(empty($merchant[0]->user_id))
<label class="labelcoz"><span class="uk-text-danger">*</span> Website</label>
<input type="text" class="uk-input" name="website" id="website" placeholder="Website">
@else
<label class="labelcoz"></span> Website No.</label>
<input type="text" class="uk-input" name="website" id="website" value="{{ $merchant[0]->website }}" placeholder="Website">
@endif
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
@if(empty($merchant[0]->user_id))
<label class="labelcoz"><span class="uk-text-danger">* </span> Tel No.</label>
<input type="text" class="uk-input" name="telno" id="telno" placeholder="Telephone Number">
@else
<label class="labelcoz">Tel No.</label>
<input type="text" class="uk-input" name="telno" id="telno" value="{{ $merchant[0]->telno }}" placeholder="Telephone Number">
@endif
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
@if(empty($merchant[0]->user_id))
<label class="labelcoz"><span class="uk-text-danger">* </span> Mobile No.</label>
<input type="text" class="uk-input" name="mobileno" id="mobileno" placeholder="Mobile Number">
@else
<label class="labelcoz">Mobile No.</label>
<input type="text" class="form-control" name="mobileno" id="mobileno" value="{{ $merchant[0]->phonno }}" placeholder="Mobile Number">
@endif
<div class="validate"></div>
</div>

<div class="text-left"><br>
<button type="submit" class="uk-button uk-button-primary uk-button-small">Update</button></div>                
</form>


<div class="section-title">
<h2>Contact Person</h2>
</div>

<div class="col-12">
<!-- <form action="{{ route('profile-contact-add') }}" method="post" role="form" id="valid-form">
@csrf
<div class="row">

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> First Name</label>
<input type="text" class="form-control" name="fname" id="companyname" placeholder="First Name">
<input type="hidden" class="form-control" name="prof_id" value="{{ $gatemerchant_prof[0]->profid }}">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Last Name</label>
<input type="text" class="form-control" name="lname" placeholder="Last Name">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> E-mail</label>
<input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Mobile No. <b>Ex: 09107788999</b></label>
<input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Mobile Number">
<div class="validate"></div>
</div>

<div class="text-left"><br>
<button type="submit" class="uk-button uk-button-primary uk-button-small">Save</button><br><br>
</div>    
</div>            
</form>
 -->
  <div class="card-body table-responsive p-0">
<table class="uk-table uk-table-small uk-table-divider">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No.</th>
            <th style="width: 180px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
      @forelse($contacts as $contact)
<tr>
<td>{{ $loop->index + 1 }}</td>
<td>{{ $contact->lname }} {{ $contact->fname }}</td>
<td>{{ $contact->email }}</td>
<td>{{ $contact->phonno }}</td>
<td class="text-center">
<div class="uk-button-group">
        <a href="{{ route('profile-contact-edit',$contact->id) }}" class="uk-button uk-button-primary uk-button-small">Edit</a>
        <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-{{$contact->id}}').submit();" class="uk-button uk-button-danger uk-button-small">Delete</a><form id="delete-{{$contact->id}}" method="get" action="{{ route('profile-contact-delete',$contact->id) }}" style="display: none;">

@csrf
</form>
    </div>
</td>
</tr>
@empty
<p> No listing found!</p> 
@endforelse
    </tbody>
</table>
</div>




</div>


<div class="section-title">
<h2>Addresses</h2>
</div>
<div class="col-12">

<!-- <form action="{{ route('profile-address-add') }}" method="post" role="form" id="valid-form-address">
@csrf
<div class="row">

<div class="form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Address</label>
<input type="text" name="address" class="form-control" placeholder="Address">
<input type="hidden" class="form-control" name="prof_id" value="{{ $gatemerchant_prof[0]->profid }}">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Longitude  <a href="">Google Map Reference</a></label>
<input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Latitude</label>
<input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
<div class="validate"></div>
</div>

<div class="text-left"><br>
<button type="submit" class="uk-button uk-button-primary uk-button-small">Save</button><br><br>
</div>                
</div>                
</form>

 -->









    <div class="card-body table-responsive p-0">


<table class="uk-table uk-table-small uk-table-divider">
    <thead>
        <tr>
            <th>No.</th>
            <th>Address</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
     
          @forelse($address as $addresses)
  <tr>
    <td>{{ $loop->index + 1 }}</td>
    <td>{{ $addresses->address }}</td>
    <td>{{ $addresses->longt }}</td>
    <td>{{ $addresses->latt }}</td>
    <td class="text-center">
<div class="uk-button-group">
        <a href="{{ route('profile-address-edit',$addresses->id) }}" class="uk-button uk-button-primary uk-button-small">Edit</a>
        <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-{{$addresses->id}}').submit();" class="uk-button uk-button-danger uk-button-small">Delete</a><form id="delete-{{$addresses->id}}" method="get" action="{{ route('profile-address-delete',$addresses->id) }}" style="display: none;">

@csrf
</form>
    </div>
      
    </td>
  </tr>
@empty
  <p> No listing found!</p> 
@endforelse
    </tbody>
</table>

    </div>
          
          </div>

</section>

@section('merchantjs')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-contact.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-address.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="{{ asset('ijaboCropTool-master/ijaboCropTool.min.js') }}"></script> 
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
@endsection
@endsection
