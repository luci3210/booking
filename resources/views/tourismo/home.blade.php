@extends('layouts.tourismo.ui')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">
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

@section('banner')
<div class="uk-position-relative uk-visible-toggle uk-light mt-sm-slider d-none d-sm-none d-lg-block d-md-block d-xl-block " tabindex="-1" uk-slideshow="ratio: 10:3; animation: push">
    <ul class="uk-slideshow-items min-vh-30">
      @foreach($banner as $list)
        <li>
            <img src="{{ asset('image/banner')}}/{{ $list->banner_img == '' ? 'default.png' : $list->banner_img }}" alt="" uk-cover>
            <div class="uk-position-center uk-position-small uk-text-center uk-light">
                0<h1 class="uk-margin-remove font-mobile"><b>{{ $list->short_des }}</b></h1>
                <p class="uk-margin-remove">{{ $list->long_desc }}</p>
            </div>
        </li>
      @endforeach
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
</div>
@endsection




@section('content')
<section class="services team aos-init aos-animate " data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

    <div class="section-title">
      <h2>
        <b>Tourismo Exclusive  </b> 
          <span style="font-size: 15px;padding-left: 25px;">
            <a href="{{ route('open_services',$slmenu_exlusive[0]->description) }}" class="uk-link"><i class="fas fa-chevron-right"></i> 
                Explore {{  $exclusive_packages->count() }} exclusive
            </a>
          </span>
      </h2>
    </div>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">

        @foreach($exclusive_packages as $list)
        <li>
          <div class="icon-box icon-box-pink">

  <div class="uk-panel">
      <img src="{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt=""  style="border-radius: 4px;">
      <div class="uk-position-center uk-panel"> </div>
  </div>

              <div class="member-info">

                <p class="mem-title" title="{{ $list->tour_name }}">{{ substr($list->tour_name, 0, 15) }} ...</p>

                <span>
                  <i class="fas fa-building"></i> {{ $list->company }}
                </span><br>

                <span class="text-price">
                  <div class="currency-symbol">₱</div> {{ $list->price }}
                </span><br>

<div class="mem-button">
  <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('service_tour_view', $list->upload_id) }}">

    Explore
  </a>

  <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)"uk-toggle="target: #prov-{{$list->upload_id}}">

   Share
  </a>
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




<section class="services team aos-init aos-animate " data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

    <div class="section-title">
      <h2><b>Local Destination </b> 
        <span style="font-size: 15px;padding-left: 25px;">
          <a href="{{ route('destination') }}" class="uk-link">
            <i class="fas fa-chevron-right"></i> Explore {{ $number_of_distination->count() }} {{ $icountry->country }}Destination
          </a></span>
      </h2>
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

                <p class="mem-title"><i class="fas fa-map-marked-alt"></i>  {{ substr($list->destination_info, 0, 15) }}...</p>

                <span>
                  <i class="fas fa-building"></i> No. of hotels : 150
                </span><br>

                <span>
                  <i class="fas fa-directions"></i> No. of Tour Operators : 251
                </span><br>

                <div class="mem-button">

                  <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('provice', $list->provice_id) }}">
                    Explore
                  </a>

                  <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)"uk-toggle="target: #prov-{{$list->upload_id}}" >
                    Share
                  </a>

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
  <h2><b>International Destination </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('destination') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $international[0]->count() }} Destination</a></span></h2>
</div>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">



        @foreach($international as $list)
        <li>
          <div class="icon-box icon-box-pink">


              <div class="uk-panel">
                  <img src="{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" alt=""  style="border-radius: 4px;">
                  <div class="uk-position-center uk-panel"> </div>
              </div>

              <div class="member-info">

                <p class="mem-title"><i class="fas fa-map-marked-alt"></i>  {{ substr($list->destination_info,0,15) }}...</p>

                <span>
                  <i class="fas fa-building"></i> No. of hotels : 150
                </span><br>

                <span>
                  <i class="fas fa-directions"></i> No. of Tour Operators : 251
                </span><br>
                
<div class="mem-button">

  <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('provice', $list->provice_id) }}">
    Explore
  </a>

  <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)" uk-toggle="target: #prov-{{$list->upload_id}}">
    Share
  </a>
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

<!-- rooms section start -->
  <section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

  <div class="container">
    <div class="row">

      <div class="section-title">
        
        <h2><b>Rooms </b> 
          <span style="font-size: 15px;padding-left: 25px;">
            <a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> 
              Explore {{ $hotel_packages->count() }} Exclusive
            </a>
          </span>
        </h2>

      </div>
      <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
      <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">
        @foreach($hotel_packages as $list)
        <li>

<div class="icon-box icon-box-pink">

<div class="uk-panel">
<img src="{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt=""  style="border-radius: 4px;">
<div class="uk-position-center uk-panel"> </div>
</div>


<div class="member-info">

  <p class="mem-title" title="{{ $list->tour_name }}">{{ $list->tour_name }}</p>

  <span class="text-price">
    <div class="currency-symbol">₱</div> {{ $list->price }} / For {{ $list->nonight }} Night
  </span><br>

  <span>
    <i class="fas fa-concierge-bell"></i> {{ $list->booking_package }}
  </span><br>


  <span>
    <i class="fas fa-user-friends"></i> Max Guests: {{ $list->noguest }}
  </span><br>

  <span>
    <i class="fas fa-chalkboard-teacher"></i> View: {{$list->viewdeck}}
  </span><br>


  <div class="mem-button">
    <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('service_tour_view', $list->upload_id) }}">
      Explore
    </a>

    <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)"uk-toggle="target: #prov-{{$list->upload_id}}" >
     Share
    </a>
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
        
        <h2><b>Tour and Packages </b> 
          <span style="font-size: 15px;padding-left: 25px;">
            <a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> 
              Explore {{ $tour_packages->count() }} Exclusive
            </a>
          </span>
        </h2>

      </div>
      <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
      <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">
        @foreach($tour_packages as $list)
        <li>

<div class="icon-box icon-box-pink">

<div class="uk-panel">
<img src="{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt=""  style="border-radius: 4px;">
<div class="uk-position-center uk-panel"> </div>
</div>


<div class="member-info">

  <p class="mem-title" title="{{ $list->tour_name }}">{{ $list->tour_name }}</p>

  <span class="text-price">
    <div class="currency-symbol">₱</div> {{ $list->price }} / For {{ $list->nonight }} Night
  </span><br>


  <span>
    <i class="fas fa-concierge-bell"></i> {{ $list->booking_package }}
  </span><br>


  <span>
    <i class="fas fa-user-friends"></i> Max Guests: {{ $list->noguest }}
  </span><br>


  <span>
    <i class="fas fa-chalkboard-teacher"></i> View: {{$list->viewdeck}}
  </span><br>


  <div class="mem-button">
    <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('service_tour_view', $list->upload_id) }}">
      Explore
    </a>

    <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)"uk-toggle="target: #prov-{{$list->upload_id}}">
     Share
    </a>
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
      <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="javascript:void(0)" uk-toggle="target: #unavailable">
        Explore
      </a>
      <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)" uk-toggle="target: #prov">
        <i class="fas fa-share"></i> Share
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
      <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="javascript:void(0)" uk-toggle="target: #unavailable">
        Explore
      </a>
      <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)" uk-toggle="target: #prov">
        <i class="fas fa-share"></i> Share
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



@foreach($tour_packages as $list)

<div id="prov-{{$list->upload_id}}" class="uk-flex-top"  uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

      <div uk-grid class="uk-flex-center mx-auto">

      <div class="uk-position-relative uk-visible-toggle uk-light social-slider-div" tabindex="-1" uk-slider>

          <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">

          <!-- /.embed -->
          <li class="pointer social-media-share" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('service_tour_view', $list->upload_id) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )">
              <img src="{{ asset('image/socialmedia/fb.png')}}"  alt="fb">
          </li>
          <!-- /. fb -->
          <li class="pointer social-media-share" onclick="sendMessenger('{{ route('service_tour_view', $list->upload_id) }}')">
              <img src="{{ asset('image/socialmedia/msg.png')}}" alt="">
          </li>
          <!-- /.messenger -->
          <li class="pointer social-media-share" onclick="window.open('https://twitter.com/intent/tweet?text={{ $list->tour_name }}&url={{ route('service_tour_view', $list->upload_id) }}')">
              <img src="{{ asset('image/socialmedia/tw.png')}}" alt="">
          </li>
          <!-- /.tw -->
          <li class="pointer social-media-share" onclick="openApp('{{ route('service_tour_view', $list->upload_id) }}', 'wazap')" >
              <img src="{{ asset('image/socialmedia/wazap.png')}}" alt="">
          </li>
          <li class="pointer social-media-share" onclick="openApp('{{ route('service_tour_view', $list->upload_id) }}', 'viber')">
              <img src="{{ asset('image/socialmedia/vb.png')}}" alt="">
          </li>
          <!-- /.viber -->
          <li class="pointer social-media-share">
              <a  href="mailto:yourfriendsemail@sample.com?subject={{ $list->tour_name }}&body=No. of hotels : 150  visit the link {{ route('service_tour_view', $list->upload_id)}}"><img src="{{ asset('image/socialmedia/gm.png')}}" alt=""></a>
          </li>
          <!-- /.gm -->
          <li class="pointer social-media-share">
              <img src="{{ asset('image/socialmedia/we.png')}}" alt="">
              <!-- <div class="uk-position-center uk-panel"><h1>6</h1></div> -->
          </li>

          <li class="pointer social-media-share" onclick="copyLink('{{ route('service_tour_view', $list->upload_id) }}')">
              <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
          </li>
          <!-- /.cc -->
          <li class="pointer social-media-share" onclick="copyEmbed('{{ route('service_tour_view', $list->upload_id) }}', '{{ $list->tour_name }}')">
              <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
          </li>
          <!-- /.we -->
          </ul>
          <a class="uk-position-center-left uk-position-small  bg-circle" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small bg-circle" href="#" uk-slidenav-next uk-slider-item="next"></a>
      </div>
      <div class="copy-link-div">
          <p>{{ route('service_tour_view', $list->upload_id) }} <a class="copy-link" onclick="copyLink('{{ route('service_tour_view', $list->upload_id) }}')"> Copy Link</a></p>
      </div>
      </div>
  </div>
</div>

@endforeach


@foreach($hotel_packages as $list)

<div id="prov-{{$list->upload_id}}" class="uk-flex-top"  uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

      <div uk-grid class="uk-flex-center mx-auto">

      <div class="uk-position-relative uk-visible-toggle uk-light social-slider-div" tabindex="-1" uk-slider>

          <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">

          <!-- /.embed -->
          <li class="pointer social-media-share" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('service_tour_view', $list->upload_id) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )">
              <img src="{{ asset('image/socialmedia/fb.png')}}"  alt="fb">
          </li>
          <!-- /. fb -->
          <li class="pointer social-media-share" onclick="sendMessenger('{{ route('service_tour_view', $list->upload_id) }}')">
              <img src="{{ asset('image/socialmedia/msg.png')}}" alt="">
          </li>
          <!-- /.messenger -->
          <li class="pointer social-media-share" onclick="window.open('https://twitter.com/intent/tweet?text={{ $list->tour_name }}&url={{ route('service_tour_view', $list->upload_id) }}')">
              <img src="{{ asset('image/socialmedia/tw.png')}}" alt="">
          </li>
          <!-- /.tw -->
          <li class="pointer social-media-share" onclick="openApp('{{ route('service_tour_view', $list->upload_id) }}', 'wazap')" >
              <img src="{{ asset('image/socialmedia/wazap.png')}}" alt="">
          </li>
          <li class="pointer social-media-share" onclick="openApp('{{ route('service_tour_view', $list->upload_id) }}', 'viber')">
              <img src="{{ asset('image/socialmedia/vb.png')}}" alt="">
          </li>
          <!-- /.viber -->
          <li class="pointer social-media-share">
              <a  href="mailto:yourfriendsemail@sample.com?subject={{ $list->tour_name }}&body=No. of hotels : 150  visit the link {{ route('service_tour_view', $list->upload_id)}}"><img src="{{ asset('image/socialmedia/gm.png')}}" alt=""></a>
          </li>
          <!-- /.gm -->
          <li class="pointer social-media-share">
              <img src="{{ asset('image/socialmedia/we.png')}}" alt="">
              <!-- <div class="uk-position-center uk-panel"><h1>6</h1></div> -->
          </li>

          <li class="pointer social-media-share" onclick="copyLink('{{ route('service_tour_view', $list->upload_id) }}')">
              <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
          </li>
          <!-- /.cc -->
          <li class="pointer social-media-share" onclick="copyEmbed('{{ route('service_tour_view', $list->upload_id) }}', '{{ $list->tour_name }}')">
              <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
          </li>
          <!-- /.we -->
          </ul>
          <a class="uk-position-center-left uk-position-small  bg-circle" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small bg-circle" href="#" uk-slidenav-next uk-slider-item="next"></a>
      </div>
      <div class="copy-link-div">
          <p>{{ route('service_tour_view', $list->upload_id) }} <a class="copy-link" onclick="copyLink('{{ route('service_tour_view', $list->upload_id) }}')"> Copy Link</a></p>
      </div>
      </div>
  </div>
</div>

@endforeach


@foreach($exclusive_packages as $list)

<div id="prov-{{$list->upload_id}}" class="uk-flex-top"  uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

      <div uk-grid class="uk-flex-center mx-auto">

      <div class="uk-position-relative uk-visible-toggle uk-light social-slider-div" tabindex="-1" uk-slider>

          <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">
          <!-- /.embed -->
          <li class="pointer social-media-share" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('service_tour_view', $list->upload_id) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )">
              <img src="{{ asset('image/socialmedia/fb.png')}}"  alt="fb">
          </li>
          <!-- /. fb -->
          <li class="pointer social-media-share" onclick="sendMessenger('{{ route('service_tour_view', $list->upload_id) }}')">
              <img src="{{ asset('image/socialmedia/msg.png')}}" alt="">
          </li>
          <!-- /.messenger -->
          <li class="pointer social-media-share" onclick="window.open('https://twitter.com/intent/tweet?text={{ $list->tour_name }}&url={{ route('service_tour_view', $list->upload_id) }}')">
              <img src="{{ asset('image/socialmedia/tw.png')}}" alt="">
          </li>
          <!-- /.tw -->
          <li class="pointer social-media-share" onclick="openApp('{{ route('service_tour_view', $list->upload_id) }}', 'wazap')" >
              <img src="{{ asset('image/socialmedia/wazap.png')}}" alt="">
          </li>
          <li class="pointer social-media-share" onclick="openApp('{{ route('service_tour_view', $list->upload_id) }}', 'viber')">
              <img src="{{ asset('image/socialmedia/vb.png')}}" alt="">
          </li>
          <!-- /.viber -->
          <li class="pointer social-media-share">
              <a  href="mailto:yourfriendsemail@sample.com?subject={{ $list->tour_name }}&body=No. of hotels : 150  visit the link {{ route('service_tour_view', $list->upload_id)}}"><img src="{{ asset('image/socialmedia/gm.png')}}" alt=""></a>
          </li>
          <!-- /.gm -->
          <li class="pointer social-media-share">
              <img src="{{ asset('image/socialmedia/we.png')}}" alt="">
              <!-- <div class="uk-position-center uk-panel"><h1>6</h1></div> -->
          </li>

          <li class="pointer social-media-share" onclick="copyLink('{{ route('service_tour_view', $list->upload_id) }}')">
              <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
          </li>
          <!-- /.cc -->
          <li class="pointer social-media-share" onclick="copyEmbed('{{ route('service_tour_view', $list->upload_id) }}', '{{ $list->tour_name }}')">
              <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
          </li>
          <!-- /.we -->
          </ul>
          <a class="uk-position-center-left uk-position-small  bg-circle" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small bg-circle" href="#" uk-slidenav-next uk-slider-item="next"></a>
      </div>
      <div class="copy-link-div">
          <p>{{ route('service_tour_view', $list->upload_id) }} <a class="copy-link" onclick="copyLink('{{ route('service_tour_view', $list->upload_id) }}')"> Copy Link</a></p>
      </div>
      </div>
  </div>
</div>

@endforeach





@endsection

@section('js')

@endsection
