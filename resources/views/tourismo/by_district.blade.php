@extends('layouts.tourismo.ui')
@section('content')
<!-- meta tags  -->
{{-- @section('description', 'Explore '.$province->count().' Rooms and Convention') --}}
{{--  @section('keywords', $bydistrict[0]->country.' '.$bydistrict[0]->provice_name) --}}
@section('img', asset( 'upload/merchant/profilepic/default.png'))
@section('curUrl', url()->current())
<!-- /. meta tags -->

<style type="text/css">
  .text-price {
    color:#ff2f00 !important;
    font-size: 12px !important;
    font-weight: 700 !important;
 }
  .text-price .currency-symbol {
    font-size: 14px;
    display: inline-block !important;

  }
  .mem-title {
    text-transform: capitalize;
  }
  .services {
    margin-top: -10px !important;
  }
  .merchant-profile {
    margin-top: -30px !important;
  }
  .uk-panel {
    height: 200px;
  }
  .uk-panel img {
    height: 200px;
    width: 100%;
  }
  .pointer img {
    height: 50px;
    width: 50px;
  }
  .uk-modal-body {
    border-radius: 4px;
  }
</style>

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
<h2><b><a href="{{ route('destination') }}" class="uk-link">{{ $bydistrict[0]->tour_name }} </a> - {{ $bydistrict[0]->tour_name }} </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $bydistrict->count() }} Rooms and Convention</a></span></h2>
</div>

@foreach($bydistrict as $list)
<div class="col-md-6 col-lg-2 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
  <div class="icon-box icon-box-pink">
  
    <div class="member">

      <div class="member-img">
        <img src="/image/cover/2021/{{ $list->cover == '' ? 'default.png' : $list->cover }}" class="img-fluid" alt="">
      </div>

      <div class="member-info">
        
        <div style="height:70px;">
            <span>
            <a href="{{ route('by_name',[$list->country,$list->district,$list->tour_name]) }}" style="font-size:13px;font-weight:510;">{{ substr($list->tour_name,0,39) }}..</a>
            </span>
            <span style="margin-top: -9px;font-size: 12px;color:#5f5e5e"><i class="fas fa-star"></i> | 0 Reviews</span>
        </div>
        <span>          
            <div class="row" style="padding-left: 7px; padding-right: 11px;">          
                <span class="col-sm text-left" style="color:#f6412d;font-size: 14px;font-weight: 650">₱ {{ $list->price }}</span>
                <span class="col-sm text-center" style="color:#36235a;font-size: 14px;font-weight: 600 ">share</span>
            </div>
        </span>

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
