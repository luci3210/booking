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

<div class="col-lg-9 form-border">

<div class="row row-margin">

<div class="col-md-12">
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">

            <li class="uk-active"><a href="#"><b>SERVICES</b></a></li>
            
            @foreach($services as $service)
              <li class="{{ (request()->is('merchant')) ? 'active' : '' }}">
                <a href="{{ route('m-service-list',$service->id) }}"> {{ $service->name }} </a>
              </li>
            @endforeach 

        </ul>

    </div>
</nav>
</div>



<div class="col-md-12">


  <br><p class="uk-text-norma uk-text-center">Select Services!</p></span> 

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
