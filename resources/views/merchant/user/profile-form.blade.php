@extends('layouts.tourismo.ui')
@section('merchant')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
@endsection

@section('content')


<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">







<div class="col-lg-3">
      @include('layouts.tourismo.menu')
</div>

<div class="col-lg-9">

<form action="{{ route('profile-update',$merchant->id) }}" method="post" role="form" id="valid-form" class="form-border">
  @method('patch')
  @csrf

<div class="row row-margin">

<div class="col-md-12">
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">

            <li class="uk-active"><a href="#"><b>MERCHANT</b></a></li>
            
            <li class="{{ (request()->is('merchant')) ? 'active' : '' }}">
              <a href="{{ route('m-user') }}">Profile</a>
            </li>
            
            <li class="{{ (request()->is('merchant/profile/address')) ? 'active' : '' }}">
              <a href="{{ route('create_address') }}">Address</a>
            </li>

            <li class="{{ (request()->is('merchant')) ? 'active' : '' }}">
              <a href="{{ route('profile-contact') }}">Contact</a>
            </li>

        </ul>

    </div>
</nav>
</div>

</div>




  <div class="row row-margin">
    <div class="col-md-12 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> Merchant Name</label>
    <input type="text" class="uk-input" name="companyname" id="companyname" value="{{ $merchant->company }}" placeholder="Company Name">
    <div class="validate"></div>
    </div>

    <div class="col-md-12 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> About</label>
    <textarea class="uk-textarea" rows="5" name="about" id="about" placeholder="Merchant Information">{{ $merchant->about }}</textarea>
    <div class="validate"></div>
    </div>


<div class="col-md-12 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Merchant Type</label>
<select class="uk-select" name="mtype">
  @foreach($type as $list)
    <option value="{{ $list->id }}">{{ $list->description }}</option>
  @endforeach
</select>
</div>


    <div class="col-md-12 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> Merchant Address</label>
    <input type="text" class="uk-input" name="companyaddress" id="companyaddress" value="{{ $merchant->address }}" placeholder="Company Address">
    <div class="validate"></div>
    </div>

    <div class="col-md-6 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> E-mail</label>
    <input type="text" class="uk-input" name="email" id="email" value="{{ $merchant->email }}" placeholder="E-mail">
    <div class="validate"></div>
    </div>

    <div class="col-md-6 form-group mt-3">
    <label class="labelcoz">Website No.</label>
    <input type="text" class="uk-input" name="website" id="website" value="{{ $merchant->website }}" placeholder="Website">
    <div class="validate"></div>
    </div>

    <div class="col-md-6 form-group mt-3">
    <label class="labelcoz">Tel No.</label>
    <input type="text" class="uk-input" name="telno" id="telno" value="{{ $merchant->telno }}" placeholder="Telephone Number">
    <div class="validate"></div>
    </div>

    <div class="col-md-6 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> Mobile No.</label>
    <input type="text" class="uk-input" name="mobileno" id="mobileno" value="{{ $merchant->phonno }}" placeholder="Mobile Number">
    <div class="validate"></div>
    </div>

    <div class="text-left"><br>
      <button type="submit" class="uk-button uk-button-primary">Update</button>
    </div>
    </div> 

  </form>
</div>
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
