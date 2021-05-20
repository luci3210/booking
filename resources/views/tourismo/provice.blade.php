@extends('layouts.tourismo.ui')
@section('content')
<!-- meta tags  -->
@section('description', 'Explore '.$province->count().' Rooms and Convention')
@section('keywords', $province[0]->country.' '.$province[0]->provice_name)
@section('img', asset( 'upload/merchant/profilepic/default.png'))
@section('curUrl', url()->current())
<!-- /. meta tags -->

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
<h2><b><a href="{{ route('destination') }}" class="uk-link">{{ $province[0]->country }} </a> - {{ $province[0]->provice_name }} </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $province->count() }} Rooms and Convention</a></span></h2>
</div>

@foreach($province as $list)
<div class="col-md-6 col-lg-3 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
  <div class="icon-box icon-box-pink">
  
    <div class="member">

      <div class="member-img">
        <img src="{{ asset('upload/merchant/coverphoto')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" class="img-fluid" alt="">
        <div class="social">
          <a href=""><i class="icofont-twitter"></i></a>
          <a href=""><i class="icofont-facebook"></i></a>
          <a href=""><i class="icofont-instagram"></i></a>
          <a href=""><i class="icofont-linkedin"></i></a>
        </div>
      </div>

      <div class="member-info">
        <h4>{{ $list->roomname }}</h4>
        <span style="font-weight: 500px; font-size: 14px;color:#ff2f00;"><b>₱ {{ $list->price }}</b> / For {{ $list->nonight }} Night</span>

        <span>
          <img style="padding-bottom: 5px;" src="{{ asset('upload/merchant/icons/baseline_local_dining_black_18dp.png')}}">
          {{ $list->booking_package }}
        </span>
        
        <span>
          <img style="padding-bottom: 3px;" src="{{ asset('upload/merchant/icons/baseline_supervisor_account_black_18dp.png')}}">
          Max Guests: {{ $list->noguest }}
        </span>
        
        <span>
          <img style="padding-bottom: 1px;" src="{{ asset('upload/merchant/icons/baseline_visibility_black_18dp.png')}}"> City View
        </span>
      </div>

<div class="details-m">
<a class="uk-button uk-button-default uk-button-small" href="{{ route('tourismo_room', $list->upload_id) }}">Explore</a>
</div>

    </div>
  </div>
</div>
@endforeach

    </div>
  </div>
</section>

@endsection

@section('js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=2142027805833973&autoLogAppEvents=1" nonce="uUSyMk8o"></script>
@endsection
