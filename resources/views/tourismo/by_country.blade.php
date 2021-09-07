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
  .desc{
    font-size: .8rem!important;
    color: black;
    font-weight: 400;
    padding: .2rem;
  }
  .vh-95{
    min-height: 95vh;
  }
</style>

<section class="services team aos-init aos-animate vh-95" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" style="margin-top: 35px !important;">
  <div class="container">
    <div class="row">

<div class="section-title">
<h2><b><a href="{{ route('destination') }}" class="uk-link"> </a>International  </b> </h2>
</div>

@foreach($country as $list)
<div class="col-md-6 col-lg-2 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
  <div class="icon-box icon-box-pink">
  
    <div class="">

      <div class="member-img">
        <img src="/image/destination/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" class="img-fluid" alt="">
      </div>                
      <div style="height:80px;">
          <a href="" class="mem-title title-package px-1">
              @if(strlen($list->destination_info) <= 39 )
                {{ $list->destination_info }}
              @else
                {{ $list->destination_info}}
              @endif
          </a>
          <p class="elips-3 desc my-0">
            @if(strlen($list->destination_desc) <= 70 )
              {{ substr($list->destination_desc,0,70) }}
            @else
              {{ substr($list->destination_desc,0,70) }}...
            @endif

          </p>

      </div>
      <div class="row g-1 px-1 my-2">
        <div class="col-12">
          <div class="d-grid gap-2">
            <a class="uk-button uk-button-small btn-room-details-m mb-sm-1 theme-btn" href="#">
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
