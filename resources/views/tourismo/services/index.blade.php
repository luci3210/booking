@extends('layouts.tourismo.ui')
@section('content')

<style>
  .bg-img-cover{
  min-height: 20vh;
}
</style>
<section class="services team aos-init aos-animate" style="min-height: 80vh;" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
  <h2><b>{{ $data[0]->name }} </b><span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('all_services',$data[0]->description) }}" class="uk-link"> View All</a></span></h2>
</div>

<div class="row ">
@foreach($data as $list)

<div class="col-lg-3 col-md-4 col-sm-4">


<div class="icon-box icon-box-pink">

<div class="uk-panel">
  <div class="spacer-width" style="width: 100rem;">
  </div>
  <div class="member-img bg-img-cover" style="background-image: url('{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;">
  </div>
  <div class="uk-position-center uk-panel"> </div>
</div>
<!-- /. uk panel -->

  <div class="member-info">
    
    <p class="mem-title"><i class="fas fa-building"></i>  {{ $list->tour_name }}</p>
    
    <span>
      <i class="fas fa-star"></i> 5 Star Hotels and Resort
    </span><br>
    
    <span>
      <i class="fas fa-person-booth"></i> Posted rooms : 150
    </span><br>

    <div class="mem-button">
      <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)" uk-toggle="target: #unavailable">
        Explore
      </a>
    </div>

  </div>

</div>
        

</div>
@endforeach


    </div>
  </div>
</section>







<!-- ------------------------modal share ------------------------>

<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div>
</div>

@endsection

@section('js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=2142027805833973&autoLogAppEvents=1" nonce="uUSyMk8o"></script>
@endsection
