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
  @media (min-width: 200px) { 
    .wd-5{
      width: 50%;
      flex: none;
    }

  }
  @media (min-width: 768px) { 
    .wd-5{
      width: 20%;
      flex: none;
    }

  }
  
</style>

<section class="services team aos-init aos-animate vh-95" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" style="margin-top: 35px !important;">
  <div class="container">
    <div class="row">

<div class="section-title">
<h2><b><a href="{{ route('destination') }}" class="uk-link"> </a>{{ $bydistrict[0]->country }} - {{ $bydistrict[0]->district }} </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore our Rooms and Packages</a></span></h2>
</div>

@foreach($bydistrict as $list)
<div class="wd-5">
    <div class="icon-box icon-box-pink">
      <div class="uk-panel">
        <a  href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
            <img src="{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt=""  style="border-radius: 4px;">
          <div class="uk-position-center uk-panel"> </div>
        </a>
      </div>

        <div class="member-info">

        <p class="mem-title title-package elips-1 mb-0" uk-tooltip="title: {{ $list->tour_name }}; pos: top-left" title="{{ $list->tour_name }}">{{ $list->tour_name }}</p>

          <span class="text-price  mb-0">
            <div class="currency-symbol">₱</div> {{ $list->price }}
          </span><br>

          <div class="row g-1 px-1 my-2">
            <div class="col-6">
              <div class="d-grid gap-2">
                <a class="uk-button uk-button-small theme-btn mb-sm-1" href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
                  Explore
                </a>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <div class="d-grid gap-2">
                <a class="uk-button uk-button-small mb-sm-1 theme-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#global-share"  onclick="openShare('{{$list}}')"  >
                Share
                </a>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- row -->

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
