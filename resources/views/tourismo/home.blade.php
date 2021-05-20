@extends('layouts.tourismo.ui')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">

<div class="marg-header"></div>
@section('banner')


<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 10:3; animation: push">
    <ul class="uk-slideshow-items">
      @foreach($home_hotel as $list)
        <li>
            <img src="{{ asset('upload/merchant/coverphoto')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt="" uk-cover>
            <div class="uk-position-center uk-position-small uk-text-center uk-light">
                <h1 class="uk-margin-remove"><b>Tourism Made Easy</b></h1>
                <p class="uk-margin-remove">Its All started with seeding of inspiration</p>
            </div>
        </li>
      @endforeach
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
</div>
@endsection



@section('content')
<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
  <h2><b>Exclusives </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('destination') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore all {{ $number_of_distination->count() }} Deals</a></span></h2>
</div>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">



        @foreach($destination as $list)
        <li>
          <div class="icon-box icon-box-pink">


              <div class="uk-panel">
                  <img src="{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" alt="" style="border-radius: 4px;">
                  <div class="uk-position-center uk-panel"> </div>
              </div>

              <div class="member-info">

                <p class="mem-title"><i class="fas fa-map-marked-alt"></i>  {{ $list->destination_info }}</p>


              </div>

            </div>
        </li>
        @endforeach
        
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

    </div>
  </div>
</section>




<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container" style="margin-top: -45px;">
    <div class="row">

<div class="section-title">
  <h2><b>Local Destination </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('destination') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore all {{ $number_of_distination->count() }} Destination</a></span></h2>
</div>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">



        @foreach($destination as $list)
        <li>
          <div class="icon-box icon-box-pink">


              <div class="uk-panel">
                  <img src="{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" alt=""  style="border-radius: 4px;">
                  <div class="uk-position-center uk-panel"> </div>
              </div>

              <div class="member-info">

                <p class="mem-title"><i class="fas fa-map-marked-alt"></i>  {{ $list->destination_info }}</p>

                <span>
                  <i class="fas fa-building"></i> No. of hotels : 150
                </span><br>

                <span>
                  <i class="fas fa-directions"></i> No. of Tour Operators : 251
                </span><br>

<div class="mem-button">

  <a class="uk-button uk-button-small btn-room-details-m" href="{{ route('provice', $list->provice_id) }}">
    Explore
  </a>

  <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)"uk-toggle="target: #prov" >
    <i class="fas fa-share"></i> Share
  </a>
  <!--  share modal  -->

  <div id="prov" uk-modal class="uk-flex-top">
      <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
          <h2 class="uk-modal-title"></h2>
          <div uk-grid class="uk-flex-center">
              <div><i uk-icon="icon: facebook; ratio: 2" class="share-icons" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('provice', $list->provice_id) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )"></i></div>
              <div><i uk-icon="icon: twitter; ratio: 2" class="share-icons"  onclick="window.open('https://twitter.com/intent/tweet?text={{ $list->destination_info }}&url={{ route('provice', $list->provice_id) }}')"></i></div>
              <div><i uk-icon="icon: youtube; ratio: 2" class="share-icons"></i></div>
              <div><i uk-icon="icon: instagram; ratio: 2" class="share-icons"></i></div>
              <div><i uk-icon="icon: linkedin; ratio: 2" class="share-icons"></i></div>
          </div>
      </div>
  </div>
  <!-- /. share modal -->


</div>

              </div>

            </div>
        </li>
        @endforeach
        
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

    </div>
  </div>
</section>








<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
  <h2><b>International Destination </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('destination') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore all {{ $number_of_distination->count() }} Destination</a></span></h2>
</div>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">



        @foreach($destination as $list)
        <li>
          <div class="icon-box icon-box-pink">


              <div class="uk-panel">
                  <img src="{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" alt=""  style="border-radius: 4px;">
                  <div class="uk-position-center uk-panel"> </div>
              </div>

              <div class="member-info">

                <p class="mem-title"><i class="fas fa-map-marked-alt"></i>  {{ $list->destination_info }}</p>

                <span>
                  <i class="fas fa-building"></i> No. of hotels : 150
                </span><br>

                <span>
                  <i class="fas fa-directions"></i> No. of Tour Operators : 251
                </span><br>
                
<div class="mem-button">

  <a class="uk-button uk-button-small btn-room-details-m" href="{{ route('provice', $list->provice_id) }}">
    Explore
  </a>

  <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)" uk-toggle="target: #international">
    <i class="fas fa-share"></i> Share
  </a>
  <div id="international" uk-modal class="uk-flex-top">
      <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
          <h2 class="uk-modal-title"></h2>
          <div uk-grid class="uk-flex-center">
              <div><i uk-icon="icon: facebook; ratio: 2" class="share-icons" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('provice', $list->provice_id) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )"></i></div>
              <div><i uk-icon="icon: twitter; ratio: 2" class="share-icons"  onclick="window.open('https://twitter.com/intent/tweet?text={{ $list->destination_info }}&url={{ route('provice', $list->provice_id) }}')"></i></div>
              <div><i uk-icon="icon: youtube; ratio: 2" class="share-icons"></i></div>
              <div><i uk-icon="icon: instagram; ratio: 2" class="share-icons"></i></div>
              <div><i uk-icon="icon: linkedin; ratio: 2" class="share-icons"></i></div>
          </div>
      </div>
  </div>
</div>

              </div>

            </div>
        </li>
        @endforeach
        
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

    </div>
  </div>
</section>







<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="section-title">
  <h2><b>Hotel and Resorts </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('hotel_and_resort') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $hotels->count() }} Hotels and Resorts</a></span></h2>
</div>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">

@foreach($hotels as $list)

<li>
<div class="icon-box icon-box-pink">
<div class="uk-panel">  
  <img src="{{ asset('upload/merchant/profilepic')}}/{{ $list->profilepic == '' ? 'default.png' : $list->profilepic }}" alt="">
  <div class="uk-position-center uk-panel"> </div>
</div>

  <div class="member-info">
    
    <p class="mem-title"><i class="fas fa-building"></i>  {{ $list->company }}</p>
    
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
</li>

@endforeach

</ul>

<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous">
</a>
<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next">
</a>

</div>

</div>
</div>
</section>


<!-- ----------------------------------------TOUR PACKAGE---------------------------------------- -->


<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="section-title">
  <h2><b>Tour Operator </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $tour_package->count() }} Hotels and Resorts</a></span></h2>
</div>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">

@foreach($tour_package as $list)

<li>
<div class="icon-box icon-box-pink">
<div class="uk-panel">  
  <img src="{{ asset('upload/merchant/profilepic')}}/{{ $list->profilepic == '' ? 'default.png' : $list->profilepic }}" alt=""  style="border-radius: 4px;">
  <div class="uk-position-center uk-panel"> </div>
</div>

  <div class="member-info">
    
    <p class="mem-title"><i class="fas fa-building"></i>  {{ $list->company }}</p>
    
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
</li>

@endforeach

</ul>

<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous">
</a>
<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next">
</a>

</div>

</div>
</div>
</section>




<!-- -------------------------------------- -->
<!-- <section class="why-us section-bg aos-init aos-animate" data-aos="fade-up" date-aos-delay="200">
<div class="container">

  <div class="row">
    <div class="col-lg-6 video-box">
      <img src="{{ asset('public/ads/1.png') }}" class="img-fluid" alt="">
      <a href="https://www.youtube.com/watch?v=12GY_gzSCZw" class="venobox play-btn mb-4 vbox-item" data-vbtype="video" data-autoplay="true"></a>
    </div>

    <div class="col-md-6 pt-5 order-2 order-md-1">
    <h3 class="text-center">It all started with seedlings of vision and inspiration</h3>
    <p class="font-italic">

Founded in 2018, Tourismo PH envisioned a company that is committed in energizing and revolutionizing travel<br> and tourism industry through events, innovations and technological advances. Since 2002,Founded in 2018, Tourismo PH envisioned a company that is committed in energizing and revolutionizing travel<br><br> and tourism industry through events, innovations and technological advances. Since 2002,              
Founded in 2018, Tourismo PH envisioned a company that is committed in energizing and revolutionizing travel<br> and tourism industry through events, innovations and technological advances. Since 2002,Founded in 2018, Tourismo PH envisioned a company that is committed in energizing and revolutionizing travel and tourism industry through events, innovations and technological advances. Since 2002,

    </p>

  </div>
  </div>

</div>
</section> -->




<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

      <div class="section-title">
        <h2><b>Rooms </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $home_hotel->count() }} Rooms and Convention</a></span></h2>
      </div>

@foreach($home_hotel as $list)
<div class="col-md-6 col-lg-3 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
  <div class="icon-box icon-box-pink">
  
    <div class="member">

      <div class="member-img">
        <img src="{{ asset('upload/merchant/coverphoto')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" class="img-fluid" alt=""  style="border-radius: 4px;">
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





<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

      <div class="section-title">
        <h2><b>Tour and Packages </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $tour_packages->count() }} Tour and packages</a></span></h2>
      </div>

@foreach($tour_packages as $list)

  <div class="col-md-6 col-lg-3 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
    <div class="icon-box icon-box-pink">
          
      <div class="member">

        <div class="member-img">
          <img src="{{ asset('upload/merchant/tour')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" class="img-fluid" alt=""  style="border-radius: 4px;">
          <div class="social">
            <a href=""><i class="icofont-twitter"></i></a>
            <a href=""><i class="icofont-facebook"></i></a>
            <a href=""><i class="icofont-instagram"></i></a>
            <a href=""><i class="icofont-linkedin"></i></a>
          </div>
        </div>

        <div class="member-info">

          <h4>{{ $list->tour_name }}</h4>
          <span style="font-weight: 500px; font-size: 14px;color:#ff2f00;"><b>₱ {{ $list->price }}</b> / For {{ $list->nonight }} Night</span>

          <span>
            <i class="fas fa-utensils"></i> {{ $list->booking_package }}
          </span>
          
          <span>
            <i class="fas fa-users"></i> Max Guests: {{ $list->noguest }}
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

@endsection
