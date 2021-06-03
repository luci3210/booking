@extends('layouts.tourismo.ui')
@section('content')
<!-- meta tags  -->
@section('description', $room_details[0]->address)
@section('keywords', $room_details[0]->roomname)
@section('img', asset( 'upload/merchant/coverphoto'. $room_details[0]->photo))
@section('curUrl', url()->current())
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
.heart-icon{
  color: #009d8a!important;
}

.heart-icon:focus{
    outline: 0!important;
    box-shadow: none!important
}
.toggle-heart{
  font-size: 2em!important;
}

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

.rating {
   width: 180px;
}

.rating__star {
   cursor: pointer;
   color: #dabd18b2;
}
/* ratings */


.error-msg{
  position: fixed;
  z-index: 999;
  top: 0;
  right: 0;
}
</style>
<!-- /. meta tags -->
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
  <h2 id='plan_name_checkout'>{{ $room_details[0]->roomname }}</h2>
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
    <span id='plan_price_checkout'>{{ $room_details[0]->price }}</span> / For {{ $room_details[0]->nonight }} Night
  </span>
</b>
</h3>


@if(Auth::check())
    @auth
      <!-- ---------------------------- user is authenticated ----------------- -->
    @endauth
@else 
<div id="checklogin" class="uk-modal-full" uk-modal>
<div class="uk-modal-dialog">
<button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center"><img src="{{ asset('image/logo/logoab.png') }}"></h3>
                        <div class="uk-lg-margin"></div>
                        
    <form method="POST" action="{{ route('login') }}">
      @csrf
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input class="uk-input uk-form-meduim" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input uk-form-meduim" type="password" name="password" required autocomplete="current-password">  
            </div>
        </div>

        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label class="uk-text-small"><input class="uk-checkbox" type="checkbox"> Remember Me</label>
        </div>

        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-primary uk-button-meduim uk-width-1-1">Login</button>
        </div>
        <div class="uk-text-small uk-text-center">
            No account yet? <a href="#register" uk-toggle><b>Register</b></a>
        </div>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

@endif


<div class="uikit-btn-book">

@if(Auth::check())
    @auth


<ul uk-accordion>
    
<li>
<a class="uk-button uk-button-small uk-accordion-title " href="javascript:void(0)">Book Now <span uk-icon="chevron-down"></span></a>
<!-- <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)">Like<span uk-icon="chevron-down"></span></a> -->
<!-- <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)" uk-toggle="target: #rooms-selected-{{$room_details[0]->upload_id}}" >
    Like
    <span uk-icon="chevron-down"></span>
    
  </a> -->
  <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)"uk-toggle="target: #rooms-selected-{{$room_details[0]->upload_id}}" >
    <i class="fas fa-share" style="font-size: 13px;padding-right: 4px;color: #ffffff;"></i> Share
  </a>
  <div id="rooms-selected-{{$room_details[0]->upload_id}}" uk-modal class="uk-flex-top">
      <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
          <h2 class="uk-modal-title"></h2>
          <div uk-grid class="uk-flex-center mx-auto">
            <div class="uk-position-relative uk-visible-toggle uk-light social-slider-div" tabindex="-1" uk-slider>
              <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                <li class="pointer social-media-share" onclick="copyLink('{{ route('tourismo_room', $room_details[0]->upload_id) }}')">
                    <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
                </li>
                <!-- /.cc -->
                <li class="pointer social-media-share" onclick="copyEmbed('{{ route('tourismo_room', $room_details[0]->upload_id) }}', '{{ $room_details[0]->roomname }}')">
                    <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
                </li>
                <!-- /.embed -->
                <li class="pointer social-media-share" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('tourismo_room', $room_details[0]->upload_id) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )">
                    <img src="{{ asset('image/socialmedia/fb.png')}}"  alt="fb">
                </li>
                <!-- /. fb -->
                <li class="pointer social-media-share" onclick="sendMessenger('{{ route('tourismo_room', $room_details[0]->upload_id) }}')">
                    <img src="{{ asset('image/socialmedia/msg.png')}}" alt="">
                </li>
                <!-- /.messenger -->
                <li class="pointer social-media-share" onclick="window.open('https://twitter.com/intent/tweet?text={{ $room_details[0]->roomname }}&url={{ route('tourismo_room', $room_details[0]->upload_id) }}')">
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
                    <a  href="mailto:yourfriendsemail@sample.com?subject={{ $room_details[0]->destination_info }}&body=No. of hotels : 150  visit the link {{ route('tourismo_room', $room_details[0]->upload_id)}}"><img src="{{ asset('image/socialmedia/gm.png')}}" alt=""></a>
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
                <p>{{ route('tourismo_room', $room_details[0]->upload_id) }} <a class="copy-link" onclick="copyLink('{{ route('tourismo_room', $room_details[0]->upload_id) }}')">copy link</a></p>
            </div>
          </div>
          <!-- /.div center -->
      </div>
  </div>
  <!-- /. share modal -->
<a class="heart-icon btn" href="javascript:void(0)" onclick="wishListToggle('{{ $room_details[0]->upload_id }}')"> 
    @if($wishList)
    <i class="fas fa-heart toggle-heart" >
    </i> 
    @else
    <i class="far fa-heart toggle-heart"></i> 
    @endif
</a>
<br>  

<div style="margin-top: 12px;">      
<span style="font-size:12px; font-weight: 100px;"><span uk-icon="chevron-down"></span> 200 + Booked</span>
<span style="font-size:12px; font-weight: 100px;"><span uk-icon="chevron-down"></span> No cancellation available</span>
</div>

<div class="uk-accordion-content">    
<form class="uk-form-stacked" method="POST" action="{{ route('xxxx') }}">
@csrf
<div class="row row-margin">

<div class="col-md-5 form-group mt-3">
    <label class="labelcoz">First Name</label>
    <input type="text" class="uk-input" name="billing_first_name" id="fname" value="{{ Auth::user()->fname }}" readonly="readonly">
    <div class="validate"></div>
</div>

<div class="col-md-5 form-group mt-3">
    <label class="labelcoz">First Name</label>
    <input type="text" class="uk-input" name="billing_last_name" id="lname" value="{{ Auth::user()->lname }}" readonly="readonly">
    <div class="validate"></div>
</div>

<div class="col-md-2 form-group mt-3">
    <label class="labelcoz">M.N</label>
    <input type="text" class="uk-input" name="mname" id="mname" value="{{ Auth::user()->mname }}" readonly="readonly">
    <div class="validate"></div>
 </div>

<div class="col-md-6 form-group mt-3">
    <label class="labelcoz">Phone No.</label>
    <input type="text" class="uk-input" name="billing_phone" id="pnumber" value="{{ Auth::user()->pnumber }}" readonly="readonly">
    <div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
    <label class="labelcoz">Email</label>
    <input type="text" class="uk-input" name="billing_email" id="email" value="{{ Auth::user()->email }}" readonly="readonly">
    <div class="validate"></div>
</div>

<div class="col-md-12 form-group mt-3">
    <label class="labelcoz">Address</label>
    <input type="text" class="uk-input" name="billing_address_1" id="address" value="{{ Auth::user()->address }}" readonly="readonly">
    <input type="hidden" class="uk-input" name="country" id="country" value="{{ Auth::user()->country }}" readonly="readonly">
    <div class="validate"></div>
</div>

<div class="col-md-12 form-group mt-3">
<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label><input class="uk-radio" type="radio" name="payment-method" value="paypal" checked> Pay with PayPal</label>
            <label><input class="uk-radio" type="radio" name="payment-method" value="traxion" checked> Pay with TraxionPay</label>
        </div>
        </div>
<div class="col-md-12 form-group mt-3">
<button type="button" class="uk-button uk-button-primary" onClick="checkPaymentMethod()">Continue</button>
</div>

</div>
</form>
<script>
  function wishListToggle(id){
    var crfToken = $('meta[name="csrf-token"]').attr('content');
    // console.log(crfToken);
    $.ajaxSetup({
        url: '{{ route('toggle_wishlist') }}',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            '_token': '{{ Session::token()  }}',
            'Authorization': '{{ Session::token()  }}',
        },
        method:"POST",
        data:{
          data_id: id,
          wh_page_name:'hotel'
        },
        success:function(data)
        {
          if(data['success']){
            console.log('success',data)
            if(data['msg'] == 'added'){
              $('.toggle-heart').addClass('fas');
              $('.toggle-heart').removeClass('far');
              console.log('added');
              return;
            }
            console.log('remove');
            $('.toggle-heart').removeClass('fas');
            $('.toggle-heart').addClass('far');
            return;
          }
          alert('something went wrong')
        },
        error:function(data){
          console.log('error',data)
        }
        
    });
    $.ajax();
  }

  function checkPaymentMethod(){
     let paymentType= $('input[name="payment-method"]:checked').val();

    if(paymentType == 'traxion'){
        paybyTraxion();
        return;
    }
    if(paymentType == 'paypal'){
      alert(paymentType)
      return;
    }
    if(paymentType == null){
      alert('please select payment type...')
    }
  }
  function paybyTraxion(){
    var fname = $('input[name="billing_first_name"]').val();
    var lname = $('input[name="billing_last_name"]').val();
    var company = $('input[name="billing_company"]').val();
    var city = $('input[name="billing_city"]').val();
    var country = $('input[name="billing_country"]').val();
    var address_1 = $('input[name="billing_address_1"]').val();
    var state = $('input[name="billing_state"]').val();
    var postcode = $('input[name="billing_postcode"]').val();
    var phone = $('input[name="billing_phone"]').val();
    var email = $('input[name="billing_email"]').val();
    var plan_price = parseInt($('#plan_price_checkout').text());
    var plan_name = $('#plan_name_checkout').text();
    var datam = {
        billing_first_name: fname,
        billing_last_name: lname,
        billing_middle_name: 'none',
        billing_company: 'none',
        billing_city: 'none',
        billing_country: 'none',
        billing_address_1: address_1,
        billing_state: 'none',
        billing_postcode: 'none',
        billing_phone: phone,
        billing_email: email,
        billing_price: plan_price,
        billing_plan_name: plan_name
    };
    console.log(datam);

    var crfToken = $('meta[name="csrf-token"]').attr('content');
    // console.log(crfToken);
    $.ajaxSetup({
      url: '{{ route('pay2') }}',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
        '_token': '{{ Session::token()  }}',
        'Authorization': '{{ Session::token()  }}',
      },
      method:"post",
      data:{
        billing_first_name: fname,
        billing_last_name: lname,
        billing_company: company,
        billing_city: city,
        billing_country: country,
        billing_address_1: address_1,
        billing_state: state,
        billing_postcode: postcode,
        billing_phone: phone,
        billing_email: email,
        billing_price: plan_price,
        billing_plan_name: plan_name
      },
      success:function(data)
      {
        let paymenyLink = data['dataresp']['form_link']
        window.open(paymenyLink);
        console.log(paymenyLink);
      },
      fail:function(jqXHR, textStatus) {
        console.log( "Request failed: xxxx" + textStatus );
      }
    });
    $.ajax();
    

  }
</script>

</div>

</li>

</ul>



    @endauth
@else 

  <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)" uk-toggle="target: #checklogin">
    Book Now
  </a>

  <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)"uk-toggle="target: #rooms-selected-{{$room_details[0]->upload_id}}" >
    <i class="fas fa-share"></i> Share
  </a>
  <a class="heart-icon btn" href="javascript:void(0)" onclick="wishListToggle('{{ $room_details[0]->upload_id }}')"> 
      <i class="far fa-heart toggle-heart"></i> 
  </a>

<div id="rooms-selected-{{$room_details[0]->upload_id}}" uk-modal class="uk-flex-top">
      <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
          <h2 class="uk-modal-title"></h2>
          <div uk-grid class="uk-flex-center mx-auto">
            <div class="uk-position-relative uk-visible-toggle uk-light social-slider-div" tabindex="-1" uk-slider>
              <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                <li class="pointer social-media-share" onclick="copyLink('{{ route('tourismo_room', $room_details[0]->upload_id) }}')">
                    <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
                </li>
                <!-- /.cc -->
                <li class="pointer social-media-share" onclick="copyEmbed('{{ route('tourismo_room', $room_details[0]->upload_id) }}', '{{ $room_details[0]->roomname }}')">
                    <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
                </li>
                <!-- /.embed -->
                <li class="pointer social-media-share" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('tourismo_room', $room_details[0]->upload_id) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )">
                    <img src="{{ asset('image/socialmedia/fb.png')}}"  alt="fb">
                </li>
                <!-- /. fb -->
                <li class="pointer social-media-share" onclick="sendMessenger('{{ route('tourismo_room', $room_details[0]->upload_id) }}')">
                    <img src="{{ asset('image/socialmedia/msg.png')}}" alt="">
                </li>
                <!-- /.messenger -->
                <li class="pointer social-media-share" onclick="window.open('https://twitter.com/intent/tweet?text={{ $room_details[0]->roomname }}&url={{ route('tourismo_room', $room_details[0]->upload_id) }}')">
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
                    <a  href="mailto:yourfriendsemail@sample.com?subject={{ $room_details[0]->destination_info }}&body=No. of hotels : 150  visit the link {{ route('tourismo_room', $room_details[0]->upload_id)}}"><img src="{{ asset('image/socialmedia/gm.png')}}" alt=""></a>
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
                <p>{{ route('tourismo_room', $room_details[0]->upload_id) }} <a class="copy-link" onclick="copyLink('{{ route('tourismo_room', $room_details[0]->upload_id) }}')">copy link</a></p>
            </div>
          </div>
          <!-- /.div center -->
      </div>
  </div>
  <!-- /. share modal -->

  <!-- <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)" uk-toggle="target: #checklogin">
    Like
  </a> -->

@endif

</div>







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



@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show error-msg m-0" role="alert">
 <p class="m-0"> <strong>Ratings!</strong> is required</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" id="reviews">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h2>Reviews</h2>
      </div>
      <!-- /.section title -->
      <form method="post" action="{{route('hotel_review')}}" role="form">
      @csrf
        <fieldset class="uk-fieldset">
          <div class="uk-margin">
              <textarea class="uk-textarea" id="comment-textarea" name="pr_review" rows="5" placeholder="Textarea"></textarea>
          </div>
          <div class="uk-margin">
          <div class="rating">
              <input class="" id="reviews-rating" name="pr_ratings" rows="5" type="number" hidden />
              <input class="" id="reviews-rating" name="pr_page_id" value="{{$room_details[0]->upload_id}}" rows="5" type="number" hidden />
                
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
          </div>
          </div>
          <button class="comment-btn uk-button uk-button-small">Cancel</button>
          @if(Auth::check())
            @auth
            <button type="submit" class="comment-btn uk-button uk-button-small">Submit</button>
            @endauth
          @else 
          <a href="javascript:void(0)" uk-toggle="target: #checklogin" class="comment-btn uk-button uk-button-small">Submit</a>

          @endif
          <legend class="uk-legend">Comments</legend>
        </fieldset>
        <!-- /.fieldset -->
      </form>
      <!-- /.form -->
      @if($reviewsData )
        @if(count($reviewsData) >= 1)
        <ul>
          @foreach($reviewsData as $data)
          <li>
            <article class="uk-comment">
                <header class="uk-comment-header">
                    <div class="uk-grid-medium uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-comment-avatar" src="{{ asset('upload/merchant/profilepic/default.png') }}" width="80" height="80" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">{{$data->name}}</a></h4>
                            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                <li><a href="#" style="color:black!important">35 days ago</a></li>
                                <li>
                                  <div class="rating">
                                    @for($x = 1; $x <= $data->pr_ratings; $x++)
                                      <i class="rating__star fas fa-star"></i>
                                    @endfor
                                    @for($x = 1; $x <=  (5-$data->pr_ratings); $x++)
                                    <i class="rating__star far fa-star"></i>
                                    @endfor
                                  </div>
                                
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
                <div class="uk-comment-body">
                    <p>@if(!empty($data->pr_review))
                    {{$data->pr_review}}
                    @else
                    no review
                    @endif
                    </p>
                </div>
            </article>
            <!-- /. article -->
          </li>
          @endforeach
      </ul>
      <!-- /.ul -->
        @else
        <h3>no reviews</h3>
        @endif
      @endif
      @if(!$reviewsData)
      <h3>something went wrong</h3>
      @endif
      
    </div>
  </div>
  <!-- /. container -->
</section>
<!-- /.section -->


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
                <!-- <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>{{ $list->roomname }}</h4>
                <!-- <h4>{{ $list->upload_id }}</h4> -->
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
                  <a class="uk-button uk-button-default uk-button-small btn-room-details-m" href="{{route('tourismo_room', $list->upload_id) }}" data-id="{{ $list->upload_id }}">Explore</a>
                  <button class="uk-button uk-button-default uk-button-small" type="button" data-toggle="modal" data-id="{{ $list->id }}" uk-toggle="target: #rooms-{{$list->upload_id}}">Share</button>
                </div>
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
          @endforeach

    </div>
  </div>

</section>





<!-- -----------------offcanvas-------------- -->
<div id="offcanvas-slide" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <h3 id="upload_id"></h3>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

    </div>
</div>

<script>
  const ratingStars = [...document.getElementsByClassName("rating__star")];
  let ratingReview = 0;

function executeRating(stars) {
  const starClassActive = "rating__star fas fa-star count-star";
  const starClassActive2 = ".count-star";
  const starClassInactive = "rating__star far fa-star";
  const starsLength = stars.length;
  let i;
  stars.map((star) => {
    star.onclick = () => {
      i = stars.indexOf(star);

      if (star.className===starClassInactive) {
        for (i; i >= 0; --i) {
          stars[i].className = starClassActive;
        }
      } else {
        for (i; i < starsLength; ++i) {
          stars[i].className = starClassInactive;
        }
      }
      ratingReview = $(starClassActive2).length
      var message = $('#comment-textarea').val();
      var ratingInput = $('#reviews-rating');
      ratingInput.val(parseInt(ratingReview))
      if(ratingReview >= 1 || message.length >= 1){
        $('.comment-btn').show(500);
      }else{
        $('.comment-btn').hide(500);
      }
    };

  });
}
executeRating(ratingStars);
</script>


@endsection

@section('js')
<script>


$(document).ready(function() { 
  $('.comment-btn').hide();
  $("#comment-textarea").on("focus", function( e ) {
      $('.comment-btn').show(500);
  });

  $("#comment-textarea").on("blur", function( e ) {
      var message = $('#comment-textarea').val();
      const starClassActive2 = ".count-star";
      ratingReview = $(starClassActive2).length


      if(message.length >= 1 ||  ratingReview >= 1){
          return;
      }
      $('.comment-btn').hide(500);
  });
  
});

</script>

@endsection


