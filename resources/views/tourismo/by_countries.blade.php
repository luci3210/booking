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
  .text-descs {
    font-size: 14px!important;
    color: grey;
    margin: 0;
    font-weight: 500!important;
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
  .vh-95{
    min-height: 95vh;
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
      <h2><b><a href="{{ route('destination') }}" class="uk-link"> </a>International  </b> </h2>
    </div>

    @foreach($getcountry as $list)

    <div class="wd-5">
    <div class="icon-box icon-box-pink">
      <div class="uk-panel">
        <a  href="{{route('explore_by_country',$list->destination_info)}}">
            <img src="/image/destination/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" alt="">
          <div class="uk-position-center uk-panel"> </div>
        </a>
      </div>

        <div class="member-info">

          <p class="mem-title mb-0 title-package elips-1" uk-tooltip="title: {{ $list->destination_info }}; pos: top-left" title="{{ $list->destination_info }}">{{ $list->destination_info }}</p>

          <p class="elips-2 text-descs">
            {{ $list->destination_desc }}
          </p>

          <div class="row g-1 px-1 my-2">
            <div class="col-12">
              <div class="d-grid gap-2">
                <a class="uk-button uk-button-small theme-btn mb-sm-1" href="{{route('explore_by_country',$list->destination_info)}}">
                  Explore
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
