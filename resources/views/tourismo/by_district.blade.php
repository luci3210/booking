@extends('layouts.tourismo.ui')
@section('content')
<!-- meta tags  -->
{{-- @section('description', 'Explore '.$province->count().' Rooms and Convention') --}}
{{--  @section('keywords', $bydistrict[0]->country.' '.$bydistrict[0]->provice_name) --}}
@section('img', asset( 'upload/merchant/profilepic/default.png'))
@section('curUrl', url()->current())
<!-- /. meta tags -->

<style>
  .share-icons{
    cursor: pointer;
}
.pointer{
  cursor: pointer;
}

.social-media-share {
  padding: 25px;
}

.bg-circle{
  padding: 12px 15px!important;
  border-radius: 100%!important;
  background-color: white!important;
  color: #9e9e9e!important;
  box-shadow: 0 4px 4px rgb(0 0 0 / 30%), 0 0 4px rgb(0 0 0 / 20%);
  height: 46px;
  width: 42px;
}

.social-slider-div{
  margin-left: 30px;
  padding-left: 0!important;
}
.uk-position-center-right {
  right: -13px!important;
}
.uk-position-center-left {
  left: -13px!important;
}
.mx-auto{
  margin: auto!important;
}
.copy-link{
  color: blue!important;
  text-decoration: underline!important;
}
.copy-link-div{
  margin: 0 auto!important;
  padding-left: 0px!important;
}
/* for social medial share */

.uk-button-small
{
  background-color: #502672 !important;
  border-radius: 3px !important;
  color: #fff !important;
  border:none !important;
  text-transform: capitalize !important;
  font-weight: 800 !important;
  font-size: 12px !important;
}

.uk-button-small:hover
{
  background-color: #2c0d45 !important;
  border-radius: 3px !important;
  border:none;
  color: #fff !important;
  text-transform: capitalize !important;
  font-weight: 800 !important;
  font-size: 12px !important;
}
</style>

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
<h2><b><a href="{{ route('destination') }}" class="uk-link">{{ $bydistrict[0]->tour_name }} </a> - {{ $bydistrict[0]->tour_name }} </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $bydistrict->count() }} Rooms and Convention</a></span></h2>
</div>

@foreach($bydistrict as $list)
<div class="col-md-6 col-lg-3 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
  <div class="icon-box icon-box-pink">
  
    <div class="member">

      <div class="member-img">
        <img src="{{ asset('upload/merchant/coverphoto')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" class="img-fluid" alt="">
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
  <a class="uk-button uk-button-default uk-button-small" href="">Details</a>
  <a class="uk-button uk-button-small " href="javascript:void(0)" uk-toggle="target: #rooms">
    <i class="fas fa-share"></i> Share
  </a>
  <!-- share modal -->

  <!-- /. share modal -->
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
