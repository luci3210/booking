@extends('layouts.tourismo.ui')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">
<style type="text/css">
.elips-3{
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}
.elips-2{
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
.elips-1{
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
}
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
    font-size: .8rem!important;
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
    <div class="container-fluid uk-position-relative uk-visible-toggle uk-light mt-sm-slider d-none d-sm-none d-lg-block d-md-block d-xl-block " tabindex="-1" uk-slideshow="ratio: 10:3; animation: push">
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
  <a href="{{ route('open_services',$slmenu_exlusive[0]->description) }}" class="uk-button btn-outline-web  uk-width-1-3@m  uk-width-1@s mx-auto my-2">Explore all exclusive</a>

  </div>
</section>




<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container text-center">
    <div class="row text-start">

<div class="section-title">
  <h2><b>International Destination </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('by_countries') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $international[0]->count() }} countries</a></span></h2>
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

    </div>
  <a href="{{ route('by_countries') }}" class="uk-button btn-outline-web  uk-width-1-3@m  uk-width-1@s mx-auto my-2">Explore all Countries</a>
  </div>
</section>






<section class="services team aos-init aos-animate " data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container text-center">
    <div class="row text-start">

      <div class="section-title">
        <h2><b>Near By Destination </b> 
          <span style="font-size: 15px;padding-left: 25px;">
            <a href="{{ route('destination') }}" class="uk-link">
              <i class="fas fa-chevron-right"></i> Explore {{ $number_of_distination->count() }} {{ $icountry->country }} Destination
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
                    <i class="fas fa-building"></i> No. of hotels : 150 {{ $list->country }}
                  </span><br>

                  <span>
                    <i class="fas fa-directions"></i> No. of Tour Operators : 251
                  </span><br>

                  <div class="mem-button">

                  {{--<a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('provice', $list->provice_id) }}">--}}
                  <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('by_district',[$icountry->country,$list->destination_info]) }}">
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
  <a href="{{ route('destination') }}" class="uk-button btn-outline-web  uk-width-1-3@m  uk-width-1@s mx-auto my-2">Explore all near by destination</a>

  </div>
</section>






<!-- rooms section start -->
<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

<div class="container text-center">
  <div class="row text-start">

    <div class="section-title">
      
      <h2><b>Hotels & Rooms </b> 
        <span style="font-size: 15px;padding-left: 25px;">
          <a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> 
            Explore {{ $hotel_packages->count() }} Hotels & Rooms
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
  <a href="{{ route('tour_operator') }}" class="uk-button btn-outline-web  uk-width-1-3@m  uk-width-1@s mx-auto my-2">Explore All Hotels & Rooms</a>
  
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
  <a href="{{ route('destination') }}" class="uk-button btn-outline-web  uk-width-1-3@m  uk-width-1@s mx-auto my-2">Explore all Partners</a>

  </div>
  <!-- /.container -->
</section>
<!-- partner section end  -->



<!-- news and public section start -->
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
  <a href="#" class="uk-button btn-outline-web  uk-width-1-3@m  uk-width-1@s mx-auto my-2">Explore News & Public Affairs</a>

  </div>
  <!-- /.container -->
</section>
<!-- news and public section end  -->







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
