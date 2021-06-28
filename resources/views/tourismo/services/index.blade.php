@extends('layouts.tourismo.ui')
@section('content')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">


<style>
  .bg-img-cover{
  min-height: 20vh;
  
}

.uk-button-small
{
  background-color: #502672 !important;
  border-radius: 3px !important;
  color: #fff !important;
  border:none !important;
  text-transform: capitalize !important;
  font-weight: 800 !important;
  font-size: 12px !important;
}

.uk-button-small:hover
{
  background-color: #2c0d45 !important;
  border-radius: 3px !important;
  border:none;
  color: #fff !important;
  text-transform: capitalize !important;
  font-weight: 800 !important;
  font-size: 12px !important;
}
</style>
<section class="services team aos-init aos-animate" style="min-height: 80vh;" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
  <h2><b>{{ $data[0]->name }} </b><span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('all_services',$data[0]->description) }}" class="uk-link"> View All</a></span></h2>
</div>

<div class="row ">
@foreach($data as $list)

<div class="col-lg-3 col-md-4 col-sm-4">


<div class="icon-box icon-box-pink">

<div class="uk-panel">
  <div class="spacer-width" style="width: 100rem;">
  </div>
  <div class="member-img bg-img-cover" style="background-image: url('{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;">
  </div>
  <div class="uk-position-center uk-panel"> </div>
</div>
<!-- /. uk panel -->

  <div class="member-info">
    
    <p class="mem-title"><i class="fas fa-building"></i>  {{ $list->tour_name }}</p>
    
    <span>
      <i class="fas fa-star"></i> 5 Star Hotels and Resort
    </span><br>
    
    <span>
      <i class="fas fa-person-booth"></i> Posted rooms : 150
    </span><br>

    <div class="mem-button">
        <a class="uk-button uk-button-small btn-room-details-m mb-sm-1" href="{{ route('service_tour_view', $list->upload_id) }}">
          Explore
        </a>
        <a class="uk-button uk-button-small mb-sm-1" href="javascript:void(0)" uk-toggle="target: #modals-{{$list->upload_id}}" >
          <i class="fas fa-share"></i> Share
        </a>
        <!-- share modal -->
        <div id="modals-{{$list->upload_id}}" uk-modal class="uk-flex-top">
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                <h2 class="uk-modal-title"></h2>
                <div uk-grid class="uk-flex-center mx-auto">
                <div class="uk-position-relative uk-visible-toggle uk-light social-slider-div" tabindex="-1" uk-slider>
                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                    <li class="pointer social-media-share" onclick="copyLink('{{ route('service_tour_view', $list->upload_id) }}')">
                        <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
                    </li>
                    <!-- /.cc -->
                    <li class="pointer social-media-share" onclick="copyEmbed('{{ route('service_tour_view', $list->upload_id) }}', '{{ $list->tour_name }}')">
                        <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
                    </li>
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
                    <!-- /.we -->
                    </ul>
                    <a class="uk-position-center-left uk-position-small  bg-circle" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small bg-circle" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>
                <div class="copy-link-div">
                    <p>{{ route('service_tour_view', $list->upload_id) }} <a class="copy-link" onclick="copyLink('{{ route('service_tour_view', $list->upload_id) }}')">copy link</a></p>
                </div>
                </div>
                <!-- /.div center -->
            </div>
        </div>
        <!-- /. share modal -->
    </div>

  </div>

</div>
        

</div>
@endforeach


    </div>
  </div>
</section>







<!-- ------------------------modal share ------------------------>

<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div>
</div>

@endsection

@section('js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=2142027805833973&autoLogAppEvents=1" nonce="uUSyMk8o"></script>
@endsection
