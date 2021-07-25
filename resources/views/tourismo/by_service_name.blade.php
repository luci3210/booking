@extends('layouts.tourismo.ui')
@section('content')
<!-- meta tags  -->
{{-- @section('description', 'Explore '.$province->count().' Rooms and Convention') --}}
{{--  @section('keywords', $byname[0]->country.' '.$byname[0]->provice_name) --}}
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

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" style="margin-top: 35px !important;">
  <div class="container">
    <div class="row">

<div class="col-md-7">
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 5:3;animation: push">

    <ul class="uk-slideshow-items">
        @foreach($byphotos as $list)
        <li>
            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                <img src="/image/tour/2021/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt="" uk-cover>
            </div>
        </li>
        @endforeach
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>
</div>

<div class="col-6 col-md-5">
  <h3>{{ $byname[0]->tour_name }}</h3>
  <p style="margin-top: -19px;font-size: 12px;"><i class="fas fa-building"></i> 
    {{ $byname[0]->company }}</p>
  
  <p style="margin-top: -19px;font-size: 12px;"><i class="fas fa-map-marker-alt"></i> 
    {{ $byname[0]->address }}
  </p>
  <p style="margin-top: -15px;font-size: 12px;"><i class="fas fa-star"></i> | 0 Reviews | 0 Book</p>



  @if($byname[0]->description == 'hotel_and_resort')
  
  <p style="margin-top: -5px;font-size: 14px;"><i class="fas fa-cloud-moon"></i>
      No. of night :{{ $byname[0]->nonight }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-eye"></i>
      View: {{ $byname[0]->viewdeck }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-user-tie"></i>
      Max guest: {{ $byname[0]->noguest }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-person-booth"></i>
      Room size: {{ $byname[0]->roomsize }}
  </p>

  @elseif($byname[0]->description == 'tour_operator')

  <p style="margin-top: -5px;font-size: 14px;"><i class="fas fa-cloud-moon"></i>
      No. of night :{{ $byname[0]->nonight }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-user-tie"></i>
      Max guest: {{ $byname[0]->noguest }}
  </p>

  @elseif($byname[0]->description == 'exclusive')

  <p style="margin-top: -5px;font-size: 14px;"><i class="fas fa-cloud-moon"></i>
      No. of night :{{ $byname[0]->nonight }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-user-tie"></i>
      Max guest: {{ $byname[0]->noguest }}
  </p>
  
  @else
    <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-person-booth"></i>
      Category is not exist.
  </p>
  @endif

  


<div style="height:60px;width:100%; background-color:#f4f4f4; padding: 12px 10px 5px;">
<p  style="font-size:23px;font-weight:700;color:#f7442e">₱ {{ $byname[0]->price }}</p>
</div>
<p style="margin-top: 8px; margin-bottom: 5px;font-size:13px;">
    {{ $byname[0]->name }} » {{ $byname[0]->country }} » {{ $byname[0]->district }} » {{ $byname[0]->tour_name }}
  </p>

<br>
<button type="button" class="btn btn-block btn-warning btn-flat">Book Now</button>
<button type="button" class="btn btn-block btn-primary btn-flat">Share</button>

</div>



<div class="col-7">

@if($byname[0]->description == 'hotel_and_resort')

  <div class="card-body">

  <strong>Room Description</strong>

  <p class="text-muted" style="font-size: 14px;">
      {{ $byname[0]->roomdesc }}
  </p>

  <hr>

  <strong>Room Facilities</strong>

  <p class="text-muted">
    @foreach(explode(',', $byname[0]->room_facilities) as $list)
      <li style="font-size: 14px; margin-left:15px;">{{ $list }}</li>
    @endforeach
  </p>

  <hr>

  <strong>Building Facilities</strong>
    <p class="text-muted">
      @foreach(explode(',', $byname[0]->building_facilities) as $list)
        <li style="font-size: 14px; margin-left:15px;">{{ $list }}</li>
      @endforeach
    </p>
  
  <hr>

  <strong>Package</strong>
    <p class="text-muted">
      @foreach(explode(',', $byname[0]->booking_package) as $list)
        <li style="font-size: 14px; margin-left:15px;">{{ $list }}</li>
      @endforeach
    </p>
  

  </div>

@elseif($byname[0]->description == 'tour_operator')

  <div class="card-body">
    
  <strong>Tour Package about</strong>

  <p class="text-muted" style="font-size: 14px;">
      {{ $byname[0]->tour_desc }}
  </p>

  <hr>

  <strong>What to expect</strong>

  <p class="text-muted">
    {{ $byname[0]->tour_expect }}
  </p>

  <hr>

  <strong>Cancelation and Refund Policy</strong>
    <p class="text-muted">
    </p>
  
  <hr>


  </div>

  
@elseif($byname[0]->description == 'exclusive')
  
@else

  @endif


</div>

</div>


    </div>
  </div>
</section>

@endsection

@section('js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=2142027805833973&autoLogAppEvents=1" nonce="uUSyMk8o"></script>
@endsection
