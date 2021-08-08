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

.home_slider_member_info {
  overflow: hidden;
  text-overflow: ellipsis;
  font-size:.8rem; 
  font-weight:510; 
  margin-top: 3px; 
  text-transform: capitalize;
}
.home_slider_member_info a {
  color: #000 !important;
}
.home_slider_member_info a:hover {

  color: #303030 !important;
}
.home_reviews_share {
  margin-top: -8px;
  font-size: 12px;
  color:#5f5e5e;
}
.home_row_price {
  padding-left: 7px; 
  padding-right: 11px; 
  margin-bottom: 5px;

}

</style>

@section('banner')
<div class="uk-position-relative uk-visible-toggle uk-light mt-sm-slider d-none d-sm-none d-lg-block d-md-block d-xl-block " tabindex="-1" uk-slideshow="ratio: 10:3; animation: push">
    <ul class="uk-slideshow-items min-vh-30">
      @foreach($banner as $list)
        <li>
            <img src="{{ asset('image/banner')}}/{{ $list->banner_img == '' ? 'default.png' : $list->banner_img }}" alt="" uk-cover>
            <div class="uk-position-center uk-position-small uk-text-center uk-light">
                <h1 class="uk-margin-remove font-mobile"><b>{{ $list->short_des }}</b></h1>
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





<!-- ---------------------------------------------------------------------- -->
<!-- -----------------------Tourismo Exclusive----------------------------- -->
<!-- ---------------------------------------------------------------------- -->


<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
  <h2><b>Exclusive </b>
  </h2>

</div>

<div class="uk-section" style="margin-top:-65px; margin-bottom: -110px;">
<div uk-slider>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">

  @foreach($service_exclusives as $list)
  <div class="col-md-6 col-lg-2 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
    <div class="icon-box icon-box-pink" style="margin-right:5px; margin-left: 3px;">
      <li>
        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
        <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
          <img src="/image/cover/2021/{{ $list->cover == '' ? 'default.png' : $list->cover }}" class="uk-transition-scale-up uk-transition-opaque"lt="" style="border-radius: 4px;">

        </a>


        </div>
        <div class="uk-position-center uk-panel"></div>


<div class="member-info">
        
<div style="height:65px;">

<div class="home_slider_member_info">
  <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">    
    @if(strlen($list->tour_name) <= 39 )
      {{ $list->tour_name }}
    @else
      {{ substr($list->tour_name,0,39) }}...
    @endif
  </a>
</div>  

<span class="home_reviews_share">
  <i class="fas fa-star"></i> | 0 Reviews | 
    <a href="javascript:void(0)"uk-toggle="target: #prov-{{$list->serviceid}}" style="font-weight:510">
      <i class="fas fa-share-alt"></i> Share
    </a>
  </span>
</div>         

<div class="row home_row_price">          
    <span class="col-sm text-left" style="color:#ee4d2d;
  font-size:.9rem;
  font-weight: 510;">₱ {{ $list->price }}</span>
</div>
    
</div>


      </li>
    </div>
  </div>
  @endforeach

</ul>

<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

</div>
</div>

<a href="{{ route('open_services',$slmenu_exlusive[0]->description) }}" class="btn btn-outline-web btn-small mt-1 px-1 fw-bold">
  Explore Exculive
</a>
    
    </div>
  </div>
</section>





<!-- ---------------------------------------------------------------------- -->
<!-- ----------------------- International Destination -------------------- -->
<!-- ---------------------------------------------------------------------- -->

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
  <h2><b>International Destination </b></h2>
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

  <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('by_country', $list->country) }}">
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


<a href="{{ route('by_countries') }}" class="btn btn-outline-web btn-small mt-2 px-5 fw-bold">Explore International Destination</a>

    </div>
  </div>
</section>


<!-- ---------------------------------------------------------------------- -->
<!-- ----------------------- Local Destination ---------------------------- -->
<!-- ---------------------------------------------------------------------- -->

<section class="services team aos-init aos-animate " data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

    <div class="section-title">
      <h2><b>Local Destination </b> 
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
                  <i class="fas fa-building"></i> No. of hotels : 150 {{ $list->country }}
                </span><br>

                <span>
                  <i class="fas fa-directions"></i> No. of Tour Operators : 251
                </span><br>

<div class="mem-button">
<a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{-- route('by_district',[$icountry->country,$list->destination_info]) --}}">
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


<a href="{{ route('by_country','philippines') }}" class="btn btn-outline-web btn-small mt-2 px-5 fw-bold">Explore Local Destination</a>

    </div>
  </div>
</section>



<!-- ---------------------------------------------------------------------- -->
<!-- ----------------------------------- Rooms ---------------------------- -->
<!-- ---------------------------------------------------------------------- -->

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
  <h2><b>Rooms </b> 
    <span style="font-size: 15px;padding-left: 15px;">
      <a href="{{ route('hotel_and_resort') }}" class="uk-link"><i class="fas fa-chevron-right"></i> 
        Explore 
      </a>
    </span>
  </h2>

</div>

<div class="uk-section" style="margin-top:-65px; margin-bottom: -110px;">
<div uk-slider>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">

  @foreach($service_rooms as $list)
  <div class="col-md-6 col-lg-2 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
    <div class="icon-box icon-box-pink" style="margin-right:5px; margin-left: 3px;">
      <li>
        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
        <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
          <img src="/image/cover/2021/{{ $list->cover == '' ? 'default.png' : $list->cover }}" class="uk-transition-scale-up uk-transition-opaque"lt="" style="border-radius: 4px;">

        </a>


        </div>
        <div class="uk-position-center uk-panel"></div>


<div class="member-info">
        
<div style="height:65px;">

<div class="home_slider_member_info">
  <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">    
    @if(strlen($list->tour_name) <= 39 )
      {{ $list->tour_name }}
    @else
      {{ substr($list->tour_name,0,39) }}...
    @endif
  </a>
</div>  

<span class="home_reviews_share">
  <i class="fas fa-star"></i> | 0 Reviews | 
    <a href="javascript:void(0)"uk-toggle="target: #prov-{{$list->serviceid}}" style="font-weight:510">
      <i class="fas fa-share-alt"></i> Share
    </a>
  </span>
</div>         

<div class="row home_row_price">          
    <span class="col-sm text-left" style="color:#ee4d2d;
  font-size:.9rem;
  font-weight: 510;">₱ {{ $list->price }}</span>
</div>
    
</div>


      </li>
    </div>
  </div>
  @endforeach

</ul>

<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

</div>
</div>
    
    </div>
  </div>
</section>



<!-- ----------------------------------------------------------------------------- -->
<!-- ----------------------------------- Tour Package ---------------------------- -->
<!-- ----------------------------------------------------------------------------- -->

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
  <h2><b>Tour and Packages  </b> 
    <span style="font-size: 15px;padding-left: 15px;">
      <a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> 
        Explore 
      </a>
    </span>
  </h2>

</div>

<div class="uk-section" style="margin-top:-65px; margin-bottom: -110px;">
<div uk-slider>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">

  @foreach($service_tours as $list)
  <div class="col-md-6 col-lg-2 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
    <div class="icon-box icon-box-pink" style="margin-right:5px; margin-left: 3px;">
      <li>
        <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
          <img src="/image/cover/2021/{{ $list->cover == '' ? 'default.png' : $list->cover }}" alt="" style="border-radius: 4px;">
        </a>
        <div class="uk-position-center uk-panel"></div>


<div class="member-info">
        
<div style="height:65px;">

<div class="home_slider_member_info">
  <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">    
    @if(strlen($list->tour_name) <= 39 )
      {{ $list->tour_name }}
    @else
      {{ substr($list->tour_name,0,39) }}...
    @endif
  </a>
</div>  

<span class="home_reviews_share">
  <i class="fas fa-star"></i> | 0 Reviews | 
    <a href="javascript:void(0)"uk-toggle="target: #prov-{{$list->serviceid}}" style="font-weight:510">
      <i class="fas fa-share-alt"></i> Share
    </a>
  </span>
</div>         

<div class="row home_row_price">          
    <span class="col-sm text-left" style="color:#ee4d2d;
  font-size:.9rem;
  font-weight: 510;">₱ {{ $list->price }}</span>
</div>
    
</div>


      </li>
    </div>
  </div>
  @endforeach

</ul>

<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

</div>
</div>
    
    </div>
  </div>
</section>





<!-- ----------------------------------------------------------------------------------- -->
<!-- ----------------------------------- Hotel and Resorts  ---------------------------- -->
<!-- ----------------------------------------------------------------------------------- -->

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="section-title">
  <h2><b>Hotel and Resorts </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('hotel_and_resort') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{-- $hotels->count() --}} Hotels and Resorts</a></span></h2>
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


<!-- ----------------------------------------------------------------------------------- -->
<!-- -----------------------------------  Partners  ------------------------------------ -->
<!-- ----------------------------------------------------------------------------------- -->


<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container text-center">
    <div class="row text-start">
      <div class="col-12">
        <div class="section-title">
          <h2><b>Partners </b> 
          </h2>
        </div>
        <!-- .section title -->
      </div>
      <!-- /.col -->
      <div class="col-12">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
          <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">
            @for($x=0; $x <= 6; $x++)
            <li>
              <div class=" icon-box-pink">
              <div class="uk-panel">
                <img src="{{ asset('/image/cover/2021/default.png') }}" alt=""  style="border-radius: 4px;">
                <div class="uk-position-center uk-panel"> </div>
              </div>
              <!-- /.panel -->
              </div>
              <!-- /.box -->
              
            </li>
            <!-- /.li -->
            @endfor
          </ul>
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
          <!-- /.ul -->
        </div>
        <!-- /. ukslider -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <a href="#" class="btn btn-outline-web btn-small mt-2 px-5 fw-bold">Explore All Partners</a>

  </div>
  <!-- /.container -->
</section>



<!-- ----------------------------------------------------------------------------------- -->
<!-- -------------------------------  News & Public Affairs  --------------------------- -->
<!-- ----------------------------------------------------------------------------------- -->

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container text-center">
    <div class="row text-start">
      <div class="col-12">
        <div class="section-title">
          <h2><b>News & Public Affairs </b> 
          </h2>
        </div>
        <!-- .section title -->
      </div>
      <!-- /.col -->
      <div class="col-12">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
          <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">
            @for($x=0; $x <= 6; $x++)
            <li>
              <div class="icon-box icon-box-pink">
              <div class="uk-panel">
                <img src="{{ asset('/image/cover/2021/default.png') }}" alt=""  style="border-radius: 4px;">
                <div class="uk-position-center uk-panel"> </div>
              </div>
              <!-- /.panel -->
              <div class="member-info">

              <p class="mem-title elips-1" title="{{ $list->tour_name }}">TITLE {{ $x }}</p>
              <span>
                <i class="fas fa-user-edit"></i> : name of me {{$x}}
              </span><br>
              <span>
                <i class="fas fa-calendar"></i> : August {{$x}}, 2021
              </span>
              <p class="my-1 elips-3 text-muted fs-6 fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui ex exercitationem facilis aliquam modi ad, saepe alias quam tenetur rem nobis corporis harum similique aperiam molestias voluptatibus amet. Suscipit, quidem.</p>
              
              </div>
              <!-- /.mem info -->
                <div class="mem-button">
                  <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="#">
                    Explore
                  </a>

                  <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)" uk-toggle="#" >
                  Share
                  </a>
                </div>
                <!-- /.btn -->

              </div>
              <!-- /.box -->
              
            </li>
            <!-- /.li -->
            @endfor
          </ul>
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
          <!-- /.ul -->
        </div>
        <!-- /. ukslider -->
      </div>
    </div>
    <!-- /.row -->
    <a href="#" class="btn btn-outline-web btn-small mt-2 px-5 fw-bold">Explore All News & Public Affairs</a>

  </div>
  <!-- /.container -->
</section>





<!-- ----------------------------------------------------------------------------------- -->
<!-- -------------------------------  Modal for share  --------------------------------- -->
<!-- ----------------------------------------------------------------------------------- -->


@foreach($service_exclusives as $list)

<div id="prov-{{$list->serviceid}}" class="uk-flex-top"  uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

      <div uk-grid class="uk-flex-center mx-auto">

      <div class="uk-position-relative uk-visible-toggle uk-light social-slider-div" tabindex="-1" uk-slider>

          <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">

          <!-- /.embed -->
          <li class="pointer social-media-share" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )">


              <img src="{{ asset('image/socialmedia/fb.png')}}"  alt="fb">
          </li>
          <!-- /. fb -->
          <li class="pointer social-media-share" onclick="sendMessenger('{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}')">
              <img src="{{ asset('image/socialmedia/msg.png')}}" alt="">
          </li>
          <!-- /.messenger -->
          
          <!-- /.tw -->
          <li class="pointer social-media-share" onclick="openApp('{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}', 'wazap')" >
              <img src="{{ asset('image/socialmedia/wazap.png')}}" alt="">
          </li>
          <li class="pointer social-media-share" onclick="openApp('{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}', 'viber')">
              <img src="{{ asset('image/socialmedia/vb.png')}}" alt="">
          </li>
          <!-- /.viber -->
          <li class="pointer social-media-share">
              <a  href="mailto:yourfriendsemail@sample.com?subject={{ $list->tour_name }}&body=No. of hotels : 150  visit the link {{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}"><img src="{{ asset('image/socialmedia/gm.png')}}" alt=""></a>
          </li>
          <!-- /.gm -->
          <li class="pointer social-media-share">
              <img src="{{ asset('image/socialmedia/we.png')}}" alt="">
              <!-- <div class="uk-position-center uk-panel"><h1>6</h1></div> -->
          </li>

          <li class="pointer social-media-share" onclick="copyLink('{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}')">
              <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
          </li>
          <!-- /.cc -->
          <li class="pointer social-media-share" onclick="copyEmbed('{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}', '{{ $list->tour_name }}')">
              <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
          </li>
          <!-- /.we -->
          </ul>
          <a class="uk-position-center-left uk-position-small  bg-circle" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small bg-circle" href="#" uk-slidenav-next uk-slider-item="next"></a>
      </div>
      <div class="copy-link-div">
          <p>{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}<a class="copy-link" onclick="copyLink('{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}"> Copy Link</a></p>
      </div>
      </div>
  </div>
</div>

@endforeach

@endsection

@section('js')

@endsection
