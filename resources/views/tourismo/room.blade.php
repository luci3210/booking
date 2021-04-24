@extends('layouts.tourismo.ui')
@section('banner')
@endsection()

@section('content')
<section class="features">
      <div class="container">

<div style="margin-top: 45px;"></div>

<!-- <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true"> -->
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 8:3; animation: push">

    <ul class="uk-slideshow-items">
      @foreach($room_details as $details)
        <li>
            <img src="{{ asset('upload/merchant/coverphoto')}}/{{ $details->photo == '' ? 'default.png' : $details->photo }}" alt="" uk-cover>
             <div class="uk-position-center uk-position-small uk-text-center uk-light">
                <h1 class="uk-margin-remove"><b>Tourism Made Easy</b></h1>
                <p class="uk-margin-remove">Its All started with seeding of inspiration</p>
            </div>
        </li>
      @endforeach()
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>
<div style="margin-bottom: 20px;"></div>



<div class="uk-child-width-expand@s" uk-grid>

<div>
  <div class="section-title">
  <h2>{{ $room_details[0]->roomname }}</h2>
  <p style="margin-top: -5px;">
  <span style="font-size:12px; font-weight: 100px;"><i class="fas fa-building"></i> EuroTEL Corp.</span>
  </p>
  <span style="font-size:12px; font-weight: 100px;"><i class="fas fa-map-marker-alt"></i> {{ $room_details[0]->address }}</span>
  </div>

 <h3 class="uikit-title">Booking Details</h3>
  <ul>
  <li><i class="icofont-check"></i>Room size: <b>{{ $room_details[0]->roomsize }} m²</b></li>
  <li><i class="icofont-check"></i>View : <b>City View</b></li>
  <li><i class="icofont-check"></i>Max guest: <b>{{ $room_details[0]->noguest }}</b></li>
  <li><i class="icofont-check"></i>No. of Bed: <b>{{ $room_details[0]->nobed }}</b></li>
</ul>

<h3 class="uikit-title">
  Package
</h3>

<ul>
  <li><i class="icofont-check"></i>{{ $room_details[0]->booking_package }}</li>
</ul>

<h3  class="uikit-title">
  Room Facilities
</h3>

<ul>
  <li><i class="icofont-check"></i>{{ $room_details[0]->room_facilities }}</li>
</ul>

<h3 class="uikit-title">
     Building Facilities
</h3>

<ul>
  <li><i class="icofont-check"></i>{{ $room_details[0]->building_facilities }}</li>
</ul>


</div>

    <div>
        <div class="uk-card uk-card-default uk-card-body">
            
<h3 class="uikit-title">
  <b>
 <span style="font-weight: 500px;color:#ff2f00;"> ₱ </span>
  <span style="font-size:18px; font-weight:200px;color:#ff2f00;">
    {{ $room_details[0]->price }} / For {{ $room_details[0]->nonight }} Night
  </span>
</b>
</h3>

<div class="uikit-btn-book">
  <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-nav">Default Nav</button>
  <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-slide">Slide</button>

<a class="uk-button uk-button-default uk-button-small btn-room-details-m" href="javascript:void(0)" data-id="" uk-toggle="target: #offcanvas-slide">Book Now</a>
<button class="uk-button uk-button-default uk-button-small" type="button" data-toggle="modal" data-id="" id="btn-room-details-m">Add List</button>
</div>
<span style="font-size:12px; font-weight: 100px;"><i class="far fa-bookmark"></i> 200 + Booked</span>
<span style="font-size:12px; font-weight: 100px;"><i class="fas fa-phone-slash"></i> No cancellation available</span>



        </div>

        <h3>Hotel Information</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>

        <h3>Terms & Conditions</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>

     </div>

</div>


</div>
</section>

<div style="margin-top: 45px;"></div>
<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
  <h2>Related Rooms</h2>
</div>

          @foreach($room_details as $list)
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
<a class="uk-button uk-button-default uk-button-small btn-room-details-m" href="javascript:void(0)" data-id="{{ $list->upload_id }}">Explore</a>
<button class="uk-button uk-button-default uk-button-small" type="button" data-toggle="modal" data-id="{{ $list->id }}" id="btn-room-details-m">Details</button>

</div>

            </div>
          </div>
          </div>
          @endforeach

    </div>
  </div>

</section>
<!-- -----------------offcanvas-------------- -->
<div id="offcanvas-slide" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <h3>Title</h3>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

    </div>
</div>

@endsection

@section('js')
@endsection
