@extends('layouts.tourismo.ui_mobile', 
['keywords'=> $tourDetails[0]->tour_name,
'img' => asset( 'image/tour/2021/'.$tourPhotos[0]->photo),
'description' => $profileData[0]->address
])

<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- /. meta tags -->
@section('content')


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

.rating__star-comment {
   cursor: pointer;
   color: #dabd18b2;
}
.rating__star {
   cursor: pointer;
   color: #dabd18b2;
}
/* ratings */

a.page-link {
    color: black!important;
}


.error-msg{
  position: fixed;
  z-index: 999;
  top: 0;
  right: 0;
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
.comment-text{
  font-size: .9em;
}

.avatar-border-round{
  border-radius: 50%;
}
.card-shadow{
    box-shadow: 1px 7px 8px -5px rgba(0,0,0,0.49);
    -webkit-box-shadow: 1px 7px 8px -5px rgba(0,0,0,0.49);
    -moz-box-shadow: 1px 7px 8px -5px rgba(0,0,0,0.49);
    border-radius: 4px;
    border: solid 2px #6c6c6c2b;
    padding: .5rem;
}
/* // Large devices (desktops/laptops, 992px and up) 175% */

/* // fold devices (200px and up) */

#sticky-bottom{
  background: white;
  
  margin-bottom: 20px;
}
.stick-me{
  z-index: 99;
  position: fixed;
  bottom: -15px;
}
.h-300{
  height: 300px;
}
@media (min-width: 200px) { 

    #section-service{
        margin-top: -60px;
    }
    #plan_name_checkout{
        font-size: 1.5rem;
        font-weight: 700;
        white-space: nowrap;
    }
    
}
/* // xs devices (320px and up) */
@media (min-width: 320px) { 
    #section-service{
        margin-top: -60px;
    }
}
/* // sm devices (360px and up) */
@media (min-width: 360px) { 

    #section-service{
        margin-top: -60px;
    }
    #plan_name_checkout{
        font-size: 1.5rem;
        font-weight: 700;
        white-space: nowrap;
    }
    
}

/* // Medium devices (411px and up) */
@media (min-width: 411px) { 
    
}

/* // lg devices (tablets, 480px and up) */
@media (min-width: 480px) { 

}

/* // sm web devices (tablets, 576px and up) */
@media (min-width: 576px) { 

}

</style>



<section class="features" id="section-service">
    <div class="container">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 4:3; animation: push">
            <ul class="uk-slideshow-items">
            @foreach($tourPhotos as $details)
                <li>
                    <img src="{{ asset('image/tour/2021')}}/{{ $details->photo == '' ? 'default.png' : $details->photo }}" alt="" uk-cover>
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
        <!-- /.slidehow div -->

        <div class="row g-0">
            <div class="col-12">
                <h2 id='plan_name_checkout' class="mb-1">{{ $tourDetails[0]->tour_name }}</h2>
                <p class="my-1"><i class="fas fa-building"></i> {{$profileData[0]->company}}</p>
                <p class="my-1"><i class="fas fa-map-marker-alt"></i> {{ $tourDetails[0]->serviceid }}</p>
            </div>
            <div class="col-6">
                <h3 class="uikit-title my-1">Booking Details</h3>
                <ul class="my-1">
                        <li><i class="icofont-check"></i>Room size: <b>{{ $tourDetails[0]->roomsize }} m²</b></li>
                        <li><i class="icofont-check"></i>View : <b>City View</b></li>
                        <li><i class="icofont-check"></i>Max guest: <b>{{ $tourDetails[0]->noguest }}</b></li>
                        <li><i class="icofont-check"></i>No. of Bed: <b>{{ $tourDetails[0]->nobed }}</b></li>
                    </ul>
                    <!-- /.tour details -->
            </div>
            <div class="col-6">
                <h3 class="uikit-title my-1">Package Details</h3>
                <ul class="my-1">
                    <li><i class="icofont-check"></i>{{ $tourDetails[0]->booking_package }}</li>
                </ul>
                <!-- /.tour details -->
                <h3 class="uikit-title my-1">Room Details</h3>
                <ul class="my-1">
                    <li><i class="icofont-check"></i>{{ $tourDetails[0]->room_facilities }}</li>
                </ul>
            </div>
            <div class="col-12 text-center">
                <h3 class="uikit-title my-1">Building Facilities</h3>
                <ul class="my-1">
                    <li><i class="icofont-check"></i>{{ $tourDetails[0]->building_facilities }}</li>
                </ul>
            </div>
            
        </div>
    </div>
</section>


<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" id="reviews">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h2>Reviews</h2>
      </div>
      <!-- /.section title -->
      @if(Auth::check())
      <form method="post" action="{{route('service_tour_review')}}" role="form">
      @csrf
        <fieldset class="uk-fieldset">
          <div class="uk-margin">
              <textarea class="uk-textarea" id="comment-textarea"  name="pr_review" rows="5"  placeholder="Textarea"></textarea>
          </div>
          <div class="uk-margin">
          <div class="rating">
              <input class="" id="reviews-rating" name="pr_ratings" rows="5" type="number" hidden />
              <input class="" id="reviews-rating" name="pr_page_id" value="{{$tourDetails[0]->id}}" rows="5" type="number" hidden readonly/>
                <i class="rating__star-comment far fa-star"></i>
                <i class="rating__star-comment far fa-star"></i>
                <i class="rating__star-comment far fa-star"></i>
                <i class="rating__star-comment far fa-star"></i>
                <i class="rating__star-comment far fa-star"></i>
          </div>
          <p class='text-danger error-ratings'>ratings is required</p>
          </div>
          <button class="comment-btn uk-button uk-button-small">Cancel</button>
            @auth
            <button type="button" onclick="submitReview()" class="comment-btn uk-button uk-button-small">Submit</button>
            <button type="submit" id="btn-review" class="comment-btn uk-button uk-button-small" hidden>Submit</button>
            @endauth
          <a href="javascript:void(0)" uk-toggle="target: #checklogin" class="comment-btn uk-button uk-button-small">Submit</a>

          @endif
          <legend class="uk-legend px-2">Comments</legend>
        </fieldset>
        <!-- /.fieldset -->
      </form>
      <!-- /.form -->
      @if($reviewsData )
        @if(count($reviewsData) >= 1)
        <div class="row">
          @foreach($reviewsData as $data)
          <!-- <li class="li-comment"> -->
            <article class="uk-comment col-md-8 col-sm-12">
                <header class="uk-comment-header">
                    <div class="uk-grid-medium uk-flex-middle" uk-grid>
                        <div class="uk-width-auto avatar-holder">
                            <img class="uk-comment-avatar avatar-border-round" src="{{ asset('upload/merchant/profilepic/default.png') }}" width="80" height="80" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">{{$data->name}}</a></h4>
                            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                <li><a href="#" style="color:black!important">{{ date("F j, Y, g:i a",strtotime($data->pr_created_at)) }}</a></li>
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
                    <p class="comment-text">@if(!empty($data->pr_review))
                    {{$data->pr_review}}
                    @else
                    no review
                    @endif
                    </p>
                </div>
                <hr class="mt-1">
            </article>
            <!-- /. article -->
          <!-- </li> -->
          @endforeach
        </div>
        <ul class="pagination pagination-sm m-0 float-left">
            {{$reviewsData->links() }}
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

<section class="position-relative p-0" id="section-sticky">

<div class="col-12 stick-me" id="sticky-bottom">
      <div class="card-shadow mx-2">
          <div class="row g-0">
              <div class="col-12 text-center">
                  <h3 class="mb-1">
                      <b>
                      <span style="font-weight: 500px;color:#ff2f00;"> ₱ </span>
                      <span style="font-size:18px; font-weight:200px;color:#ff2f00;">
                          <span id=''>{{ $tourDetails[0]->price }}</span> / For {{ $tourDetails[0]->nonight }} Night
                          <input id="plan_price_checkout" value="{{ floatval(str_replace(',', '', $tourDetails[0]->price)) }}" type="number" hidden>
                      </span>
                      </b>
                  </h3>
              </div>
              <div class="col-12 text-center">
                  <ul uk-accordion>
                      <li>
                          @if(Auth::check())
                            @auth
                          <a class="uk-button uk-button-small uk-accordion-title " href="javascript:void(0)">Book Now <span uk-icon="chevron-down"></span></a>
                          <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)"uk-toggle="target: #rooms-selected-{{$tourDetails[0]->id}}" >
                              <i class="fas fa-share" style="font-size: 13px;padding-right: 4px;color: #ffffff;"></i> Share
                          </a>
                          <a class="heart-icon btn" href="javascript:void(0)" onclick="wishListToggle('{{ $tourDetails[0]->id }}')"> 
                              @if($wishList)
                              <i class="fas fa-heart toggle-heart" >
                              </i> 
                              @else
                              <i class="far fa-heart toggle-heart"></i> 
                              @endif
                          </a>
                          <div class="uk-accordion-content">
                              <form class="uk-form-stacked" method="POST" action="{{ route('xxxx') }}">
                                  @csrf
                                  <div class="row ">
                                    
                                      <div class="form-group mt-3 col-5 text-start">
                                          <label class="labelcoz ">First Name</label>
                                          <input type="text" class="uk-input" name="billing_first_name" id="fname" value="{{ Auth::user()->fname }}" readonly="readonly">
                                          <div class="validate"></div>
                                      </div>
                                      <div class="col-5 form-group mt-3 text-start">
                                          <label class="labelcoz ">First Name</label>
                                          <input type="text" class="uk-input" name="billing_last_name" id="lname" value="{{ Auth::user()->lname }}" readonly="readonly">
                                          <div class="validate"></div>
                                      </div>

                                      <div class="col-2 form-group mt-3 text-start">
                                          <label class="labelcoz">M.N</label>
                                          <input type="text" class="uk-input" name="mname" id="mname" value="{{ Auth::user()->mname }}" readonly="readonly">
                                          <div class="validate"></div>
                                      </div>

                                      <div class="col-6 form-group mt-3 text-start">
                                          <label class="labelcoz">Phone No.</label>
                                          <input type="text" class="uk-input" name="billing_phone" id="pnumber" value="{{ Auth::user()->pnumber }}" readonly="readonly">
                                          <div class="validate"></div>
                                      </div>

                                      <div class="col-6 form-group mt-3 text-start">
                                          <label class="labelcoz">Email</label>
                                          <input type="text" class="uk-input" name="billing_email" id="email" value="{{ Auth::user()->email }}" readonly="readonly">
                                          <div class="validate"></div>
                                      </div>
                                      <div class="col-6 form-group mt-3 text-start">
                                          <label class="labelcoz">Country</label>
                                          @if(count($userCountry) >= 1)
                                          <input type="text" class="uk-input" name="billing_country" id="billing_country" value="{{ $userCountry[0]->country }}" readonly="readonly">
                                          @endif
                                          <div class="validate"></div>
                                      </div>
                                      <div class="col-6 form-group mt-3 text-start">
                                          <label class="labelcoz">Book Date</label>
                                          <input type="datetime-local" class="uk-input" name="book_date" id="book_date" min="{{$curDate}}"  >
                                          <div class="validate"></div>
                                      </div>
                                      <div class="col-12 form-group mt-3 text-start">
                                          <label class="labelcoz">Address</label>
                                          <input type="text" class="uk-input" name="billing_address_1" id="address" value="{{ Auth::user()->address }}" readonly="readonly">
                                          <div class="validate"></div>
                                      </div>
                                      <div class="col-12 form-group mt-3 text-start">
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
                                  <!-- /.book form -->
                          </div>
                            @endauth
                          @else 
                          <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)" uk-toggle="target: #login">
                              Book Now
                          </a>
                          <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)"uk-toggle="target: #rooms-selected-{{$tourDetails[0]->id}}" >
                              <i class="fas fa-share" style="font-size: 13px;padding-right: 4px;color: #ffffff;"></i> Share
                          </a>
                          <a class="heart-icon btn" href="javascript:void(0)"  uk-toggle="target: #checklogin"> 
                              <i class="far fa-heart toggle-heart"></i> 
                          </a>
                          @endif
                      
                      </li>
                  </ul>


              </div>
          </div>
      </div>
  </div>

</section>

<div id="rooms-selected-{{$tourDetails[0]->id}}" uk-modal class="uk-flex-top">
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <h2 class="uk-modal-title"></h2>
        <div uk-grid class="uk-flex-center mx-auto">
            <div class="uk-position-relative uk-visible-toggle uk-light social-slider-div" tabindex="-1" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                <li class="pointer social-media-share" onclick="copyLink('{{ route('service_tour_view', $tourDetails[0]->id) }}')">
                    <img src="{{ asset('image/socialmedia/cc.png')}}"  alt="cc">
                </li>
                <!-- /.cc -->
                <li class="pointer social-media-share" onclick="copyEmbed('{{ route('service_tour_view', $tourDetails[0]->id) }}', '{{ $tourDetails[0]->tour_name }}')">
                    <img src="{{ asset('image/socialmedia/em.png')}}"  alt="fb">
                </li>
                <!-- /.embed -->
                <li class="pointer social-media-share" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('service_tour_view', $tourDetails[0]->id) }}', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )">
                    <img src="{{ asset('image/socialmedia/fb.png')}}"  alt="fb">
                </li>
                <!-- /. fb -->
                <li class="pointer social-media-share" onclick="sendMessenger('{{ route('service_tour_view', $tourDetails[0]->id) }}')">
                    <img src="{{ asset('image/socialmedia/msg.png')}}" alt="">
                </li>
                <!-- /.messenger -->
                <li class="pointer social-media-share" onclick="window.open('https://twitter.com/intent/tweet?text={{ $tourDetails[0]->tour_name }}&url={{ route('service_tour_view', $tourDetails[0]->id) }}')">
                    <img src="{{ asset('image/socialmedia/tw.png')}}" alt="">
                </li>
                <!-- /.tw -->
                <li class="pointer social-media-share" onclick="openApp('{{ route('service_tour_view', $tourDetails[0]->id) }}', 'wazap')" >
                    <img src="{{ asset('image/socialmedia/wazap.png')}}" alt="">
                </li>
                <li class="pointer social-media-share" onclick="openApp('{{ route('service_tour_view', $tourDetails[0]->id) }}', 'viber')">
                    <img src="{{ asset('image/socialmedia/vb.png')}}" alt="">
                </li>
                <!-- /.viber -->
                <li class="pointer social-media-share">
                    <a  href="mailto:yourfriendsemail@sample.com?subject={{ $tourDetails[0]->roomdesc }}&body=No. of hotels : 150  visit the link {{ route('service_tour_view', $tourDetails[0]->id)}}"><img src="{{ asset('image/socialmedia/gm.png')}}" alt=""></a>
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
                <p>{{ route('service_tour_view', $tourDetails[0]->id) }} <a class="copy-link" onclick="copyLink('{{ route('service_tour_view', $tourDetails[0]->id) }}')">copy link</a></p>
            </div>
        </div>
        <!-- /.div center -->
    </div>
</div>
<!-- /. share modal -->

@endsection


@section('js')

<script>
const ratingStars=[...document.getElementsByClassName("rating__star-comment")];let ratingReview=0;function executeRating(t){const e=t.length;let a;t.map(n=>{n.onclick=(()=>{if(a=t.indexOf(n),"rating__star-comment far fa-star "===n.className)for(;a>=0;--a)t[a].className="rating__star-comment fas fa-star count-star";else for(;a<e;++a)t[a].className="rating__star-comment far fa-star ";ratingReview=$(".count-star").length;var r=$("#comment-textarea").val();$("#reviews-rating").val(parseInt(ratingReview)),ratingReview>=1||r.length>=1?$(".comment-btn").show(500):$(".comment-btn").hide(500)})})}function submitReview(){ratingReview>=1?$("#btn-review").click():$(".error-ratings").show()}executeRating(ratingStars),window.localStorage.removeItem("bookData");
</script>
<script>

$(document).ready(function(){$(".error-ratings").hide(),$(".comment-btn").hide(),$("#comment-textarea").on("focus",function(t){$(".comment-btn").show(500)}),$("#comment-textarea").on("blur",function(t){var e=$("#comment-textarea").val();ratingReview=$(".count-star").length,e.length>=1||ratingReview>=1||$(".comment-btn").hide(500)})});

</script>

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
    var bookdate = $('input[name="book_date"]').val();
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
    var plan_price = $('#plan_price_checkout').val();
    var plan_name = $('#plan_name_checkout').text();

    if(bookdate == null || bookdate.length <= 0 || bookdate == undefined){
      swal({
        text: "Select a book date",
        icon:"error"
      });
      return;
    }

    var datam = {
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
        billing_plan_name: plan_name,
        book_date:bookdate,
        desc:'{{$tourDetails[0]->tour_desc}}',
        expect:'{{$tourDetails[0]->tour_expect}}',
        noguest:'{{$tourDetails[0]->noguest}}',
        proid:'{{$profileData[0]->id}}',
        uid: '{{$tourDetails[0]->id}}',
        url_callback:'{{route('checkout_callback')}}',
        // myurl:'http://127.0.0.1:8000/checkout',
        myurl:'https://booking.tourismo.ph/checkout',
        
    };
    console.log(datam);
    window.localStorage.setItem('bookData',JSON.stringify(datam));
    var crfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
      url: '{{ route('pay2') }}',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
        '_token': '{{ Session::token()  }}',
        'Authorization': '{{ Session::token()  }}',
      },
      method:"post",
      data:datam,
      success: async function(data)
      {
        let paymenyLink = data['dataresp']['form_link']
        window.open(paymenyLink);
        console.log(paymenyLink);
        console.log(data);
      },
      fail:function(jqXHR, textStatus) {
        console.log( "Request failed: xxxx" + textStatus );
      },
      error:function(data){
        swal({
          text: `${data.responseText}`,
          icon:"error"
        });
      }
      
    });
    $.ajax();
  }
</script>

<script>
  $(window).on('scroll', function() {
      if($(window).scrollTop() >= $('#main').offset().top + $('#main').outerHeight() - window.innerHeight) {
        $('#sticky-bottom').removeClass('stick-me');
        $('#section-sticky').removeClass('h-300');
        
        
      }else{
        $('#sticky-bottom').addClass('stick-me');
        $('#section-sticky').addClass('h-300');


      }
    });
</script>
@endsection


<script>
function goToNextPage(url){
    window.location.href=url;
}
</script>
