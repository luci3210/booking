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
  .btn-outline-web{
    border: solid 1px #502672 !important;
    font-weight: 700!important;
    color: #4a4a4a!important;
    font-size: .7rem!important;
    border-radius:5px!important;
    text-transform:capitalize;
  }
  .btn-outline-web:hover{
    background-color:#502672 !important;
    color:white !important;
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
<!-- <div class="row ">
  <div class="col-12"> -->
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
  <!-- </div>
</div> -->

@endsection




@section('content')
<section class="services team aos-init aos-animate " data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container text-center">
    <div class="row text-start">

    <div class="section-title">
      <h2>
        <b>Tourismo Exclusive  </b> 
          <!-- <span style="font-size: 15px;padding-left: 25px;">
            <a href="{{ route('open_services',$slmenu_exlusive[0]->description) }}" class="uk-link"><i class="fas fa-chevron-right"></i> 
                Explore {{  $exclusive_packages->count() }} exclusive
            </a>
          </span> -->
      </h2>
    </div>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">

        @foreach($exclusive_packages as $list)
        <li>
            <div class="icon-box icon-box-pink">
              <div class="uk-panel">
                <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
                  <img src="{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt=""  style="border-radius: 4px;">
                  <div class="uk-position-center uk-panel"> </div>
                </a>
              </div>

                <div class="member-info">

                  <p class="mem-title title-package" title="{{ $list->tour_name }}">{{ $list->tour_name }}</p>

                  <span>
                    <i class="fas fa-building"></i> {{ $list->company }}
                  </span><br>

                  <span class="text-price">
                    <div class="currency-symbol">₱</div> {{ $list->price }}
                  </span><br>

                  <div class="row g-1 px-1 my-2">
                    <div class="col-6">
                      <div class="d-grid gap-2">
                        <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
                          Explore
                        </a>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                      <div class="d-grid gap-2">
                        <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#global-share"  onclick="openShare('{{$list}}')"  >
                        Share
                        </a>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- row -->

                </div>

            </div>
        </li>
      @endforeach  
  </ul>
<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

    </div>
  <a href="{{ route('open_services',$slmenu_exlusive[0]->description) }}" class="uk-button btn-outline-web  uk-width-1-4@m  uk-width-1@s mx-auto my-2">Explore all exclusive</a>

  </div>
</section>



<section class="services team aos-init aos-animate " data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container text-center">
    <div class="row text-start">

      <div class="section-title">
        <h2><b>Local Destination</b> 
          <!-- <span style="font-size: 15px;padding-left: 25px;">
            <a href="{{ route('destination') }}" class="uk-link">
              <i class="fas fa-chevron-right"></i> Explore {{ $number_of_distination->count() }} {{ $icountry->country }} Destination
            </a></span> -->
        </h2>
      </div>

      <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
      <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">

          @foreach($destination as $list)
          <li>
            <div class="icon-box icon-box-pink">

                <div class="uk-panel">
                  <a href="{{ route('by_district',[$icountry->country,$list->destination_info]) }}">
                    <img src="{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" alt=""  style="border-radius: 4px;">
                    <div class="uk-position-center uk-panel"> </div>
                  </a>
                </div>

            <div class="member-info">

                  <p class="mem-title title-package" title="{{ $list->tour_name }}">{{ $list->destination_info }}</p>

                  <span>
                    <i class="fas fa-building"></i> No. of hotels : 150 {{ $list->country }}
                  </span><br>

                  <span>
                    <i class="fas fa-directions"></i> No. of Tour Operators : 251
                  </span><br>

                  <div class="row g-1 px-1 my-2">
                    <div class="col-12">
                      <div class="d-grid gap-2">
                        <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('by_district',[$icountry->country,$list->destination_info]) }}">
                          Explore
                        </a>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- row -->
            </div>

          </div>
          </li>
          @endforeach
          
      </ul>

      <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
      <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

  </div>

    </div>
  <a href="{{ route('destination') }}" class="uk-button btn-outline-web  uk-width-1-4@m  uk-width-1@s mx-auto my-2">Explore all Local destination</a>

  </div>
</section>





<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container text-center">
    <div class="row text-start">

<div class="section-title">
  <h2><b>International Destination </b> 
    <!-- <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('by_countries') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $international[0]->count() }} countries</a></span> -->
  </h2>
</div>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">



        @foreach($international as $list)
        <li>
          <div class="icon-box icon-box-pink">


              <div class="uk-panel">
                  <a href="{{ route('by_country', $list->country) }}">
                  <img src="{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" alt=""  style="border-radius: 4px;">
                  </a>
                  <div class="uk-position-center uk-panel"> </div>
              </div>

              <div class="member-info">

                  <p class="mem-title title-package" title="{{ $list->tour_name }}">{{ $list->destination_info }}</p>

                <span>
                  <i class="fas fa-building"></i> No. of hotels : 150
                </span><br>

                <span>
                  <i class="fas fa-directions"></i> No. of Tour Operators : 251
                </span><br>
                <div class="row g-1 px-1 my-2">
                  <div class="col-12">
                    <div class="d-grid gap-2">
                      <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('by_country', $list->country) }}">
                        Explore
                      </a>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- row -->

              </div>

            </div>
        </li>
        @endforeach
        
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

    </div>
  <a href="{{ route('by_countries') }}" class="uk-button btn-outline-web  uk-width-1-4@m  uk-width-1@s mx-auto my-2">Explore all Countries</a>
  </div>
</section>






<section class="services team aos-init aos-animate " data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container text-center">
    <div class="row text-start">

      <div class="section-title">
        <h2><b>Near By Destination </b> 
          <!-- <span style="font-size: 15px;padding-left: 25px;">
            <a href="{{ route('destination') }}" class="uk-link">
              <i class="fas fa-chevron-right"></i> Explore {{ $number_of_distination->count() }} {{ $icountry->country }} Destination
            </a></span> -->
        </h2>
      </div>
      <div class="row" id="loaders">
        <div class="col-md-3 col-sm-6 col-6 ">
          <div class="content-placeholder "></div>
        </div>
        <div class="col-md-3 col-sm-6 col-6 ">
          <div class="content-placeholder "></div>
        </div>
        <div class="col-md-3  d-none d-lg-block ">
          <div class="content-placeholder "></div>
        </div>
        <div class="col-md-3 d-none d-lg-block">
          <div class="content-placeholder "></div>
        </div>
      </div>
      
      <!-- /.holder -->
      <!-- <div class="col-12" id='load-near'>
        
      </div> -->
      
      <div class="uk-position-relative uk-visible-toggle uk-light " id="nearby-slider" tabindex="-1" uk-slider>
          <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid" id="load-near">
          </ul>

          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

      </div>
      <!-- /.slider -->


    </div>
  <a href="{{ route('destination') }}" class="uk-button btn-outline-web  uk-width-1-4@m  uk-width-1@s mx-auto my-2">Explore all near by destination</a>

  </div>
</section>






<!-- rooms section start -->
<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

<div class="container text-center">
  <div class="row text-start">

    <div class="section-title">
      
      <h2><b>Hotels & Rooms </b> 
        <!-- <span style="font-size: 15px;padding-left: 25px;">
          <a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> 
            Explore {{ $hotel_packages->count() }} Hotels & Rooms
          </a>
        </span> -->
      </h2>

    </div>
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">
      @foreach($hotel_packages as $list)
      <li>

      <div class="icon-box icon-box-pink">

      <div class="uk-panel">
      <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
        <img src="{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt=""  style="border-radius: 4px;">
      </a>
      <div class="uk-position-center uk-panel"> </div>
      </div>


      <div class="member-info">

      <p class="mem-title title-package" title="{{ $list->tour_name }}">{{ $list->tour_name }}</p>

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

      <div class="row g-1 px-1 my-2">
        <div class="col-6">
          <div class="d-grid gap-2">
          

           <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
              Explore
            </a>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-6">
          <div class="d-grid gap-2">
            <a class="uk-button uk-button-small mb-sm-1"  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#global-share"  onclick="openShare('{{$list}}')"  >
              share
            </a>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- row -->
      </div>

      </div>

      </li>
      @endforeach
    </ul>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
  </div>
  <a href="{{ route('tour_operator') }}" class="uk-button btn-outline-web  uk-width-1-4@m  uk-width-1@s mx-auto my-2">Explore All Hotels & Rooms</a>
  
</div>
</section>
<!-- partners section start -->
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
            @for($x=1; $x <= 4; $x++)
            <li>
              <div class=" icon-box-pink">
              <div class="uk-panel">
              
                <img src="{{ asset('/image/partner/').'/'.$x }}.jpg" alt=""  style="border-radius: 4px;">
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

  </div>
  <!-- /.container -->
</section>
<!-- partner section end  -->



<!-- news and public section start -->
@if($news)
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
            @foreach($news as $list)
            <li>
              <div class="icon-box icon-box-pink">
              <div class="uk-panel">
                <img src="{{ asset('/image/cover/2021/default.png') }}" alt=""  style="border-radius: 4px;">
                <div class="uk-position-center uk-panel"> </div>
              </div>
              <!-- /.panel -->
                <div class="member-info">
                  <p class="mem-title title-package" title="">{{ $list->news_title }}</p>

                  <span>
                    <i class="fas fa-calendar"></i> {{date("F j, Y, g:i a",strtotime($list->news_created_at))}}
                  </span><br>
                </div>
              </div>
              <!-- /.box -->
              
            </li>
            <!-- /.li -->
            @endforeach
          </ul>
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
          <!-- /.ul -->
        </div>
        <!-- /. ukslider -->
      </div>
    </div>
    <!-- /.row -->
  <a href="#" class="uk-button btn-outline-web  uk-width-1-3@m  uk-width-1@s mx-auto my-2">Explore News & Public Affairs</a>

  </div>
  <!-- /.container -->
</section>
<!-- news and public section end  -->
@endif





@endsection

@section('js')
<script>
getLocation()

function getNearByDestionation (){

}

</script>

@endsection
