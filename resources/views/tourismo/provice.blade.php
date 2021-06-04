@extends('layouts.tourismo.ui')
@section('content')
<!-- meta tags  -->
@section('description', 'Explore '.$province->count().' Rooms and Convention')
@section('keywords', $province[0]->country.' '.$province[0]->provice_name)
@section('img', asset( 'upload/merchant/profilepic/default.png'))
@section('curUrl', url()->current())
<!-- /. meta tags -->

<style>
  .share-icons{
    cursor: pointer;
}
.pointer{
  cursor: pointer;
}

.social-media-share {
  padding: 25px;
}

.bg-circle{
  padding: 12px 15px!important;
  border-radius: 100%!important;
  background-color: white!important;
  color: #9e9e9e!important;
  box-shadow: 0 4px 4px rgb(0 0 0 / 30%), 0 0 4px rgb(0 0 0 / 20%);
  height: 46px;
  width: 42px;
}

.social-slider-div{
  margin-left: 30px;
  padding-left: 0!important;
}
.uk-position-center-right {
  right: -13px!important;
}
.uk-position-center-left {
  left: -13px!important;
}
.mx-auto{
  margin: auto!important;
}
.copy-link{
  color: blue!important;
  text-decoration: underline!important;
}
.copy-link-div{
  margin: 0 auto!important;
  padding-left: 0px!important;
}
/* for social medial share */

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

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

<div class="section-title">
<h2><b><a href="{{ route('destination') }}" class="uk-link">{{ $province[0]->country }} </a> - {{ $province[0]->provice_name }} </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore {{ $province->count() }} Rooms and Convention</a></span></h2>
</div>

@foreach($province as $list)
<div class="col-md-6 col-lg-3 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
  <div class="icon-box icon-box-pink">
  
    <div class="member">

      <div class="member-img">
        <img src="{{ asset('upload/merchant/coverphoto')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" class="img-fluid" alt="">
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
  <a class="uk-button uk-button-default uk-button-small" href="{{ route('tourismo_room', $list->upload_id) }}">Details</a>
  <a class="uk-button uk-button-small " href="javascript:void(0)" uk-toggle="target: #rooms-{{$list->upload_id}}">
    <i class="fas fa-share"></i> Share
  </a>
  <!-- share modal -->
<div id="rooms-{{$list->upload_id}}" uk-modal class="uk-flex-top">
      <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
          <h2 class="uk-modal-title"></h2>
          <div uk-grid class="uk-flex-center mx-auto">
            <div class="uk-position-relative uk-visible-toggle uk-light social-slider-div" tabindex="-1" uk-slider>
              <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                <li class="pointer social-media-share" onclick="copyLink('{{ route('tourismo_room', $list->upload_id) }}')">
                    <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
                </li>
                <!-- /.cc -->
                <li class="pointer social-media-share" onclick="copyEmbed('{{ route('tourismo_room', $list->upload_id) }}', '{{ $list->roomname }}')">
                    <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
                </li>
                <!-- /.embed -->
                <li class="pointer social-media-share" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('tourismo_room', $list->upload_id) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )">
                    <img src="{{ asset('image/socialmedia/fb.png')}}"  alt="fb">
                </li>
                <!-- /. fb -->
                <li class="pointer social-media-share" onclick="sendMessenger('{{ route('tourismo_room', $list->upload_id) }}')">
                    <img src="{{ asset('image/socialmedia/msg.png')}}" alt="">
                </li>
                <!-- /.messenger -->
                <li class="pointer social-media-share" onclick="window.open('https://twitter.com/intent/tweet?text={{ $list->roomname }}&url={{ route('tourismo_room', $list->upload_id) }}')">
                    <img src="{{ asset('image/socialmedia/tw.png')}}" alt="">
                </li>
                <!-- /.tw -->
                <li class="pointer social-media-share" >
                    <img src="{{ asset('image/socialmedia/wazap.png')}}" alt="">
                </li>
                <li class="pointer social-media-share">
                    <img src="{{ asset('image/socialmedia/vb.png')}}" alt="">
                </li>
                <!-- /.viber -->
                <li class="pointer social-media-share">
                    <a  href="mailto:yourfriendsemail@sample.com?subject={{ $list->destination_info }}&body=No. of hotels : 150  visit the link {{ route('tourismo_room', $list->upload_id)}}"><img src="{{ asset('image/socialmedia/gm.png')}}" alt=""></a>
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
                <p>{{ route('tourismo_room', $list->upload_id) }} <a class="copy-link" onclick="copyLink('{{ route('tourismo_room', $list->upload_id) }}')">copy link</a></p>
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

@endsection

@section('js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=2142027805833973&autoLogAppEvents=1" nonce="uUSyMk8o"></script>
@endsection
