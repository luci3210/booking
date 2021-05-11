@extends('layouts.tourismo.ui')
@section('banner')

<div id="unavailable" class="uk-modal-full" uk-modal>
<div class="uk-modal-dialog">
<button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center">This page is under development</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>


<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 7:3; animation: push">
    <ul class="uk-slideshow-items">
      @foreach($hotel as $list)
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
      <h3 class="uk-heading-bullet">Distination
        <span class="uk-heading-ext">
            Explore 
        <span uk-icon="chevron-right"></span></span>
      </h3>

          @foreach($destination as $list)
<div class="col-md-6 col-lg-3 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
          <div class="icon-box icon-box-pink">
          
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" class="img-fluid" alt="">
                
              </div>
              <div class="member-info">
                <h4><i class="fas fa-map-marked-alt"></i>  {{ $list->destination_info }}</h4>


                <span>
                  <i class="fas fa-building"></i> No. of hotels : 150
                </span>

                <span>
                  <i class="fas fa-directions"></i> No. of Tour Operators : 251
                </span>

                <div class="details-m">
<a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)" uk-toggle="target: #unavailable">
  Explore {{ $list->destination_info }}
</a>
</div>

              </div>
            </div>
          </div>
          </div>
          @endforeach

    </div>
  </div>
</section>


<!-- -------------------------------------- -->
<section class="why-us section-bg aos-init aos-animate" data-aos="fade-up" date-aos-delay="200">
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
    </section>





<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

      <h3 class="uk-heading-bullet">Rooms
        <span class="uk-heading-ext">
            Explore 
        <span uk-icon="chevron-right"></span></span>
      </h3>

          @foreach($hotel as $list)
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
<a class="uk-button uk-button-default uk-button-small" href="{{ route('tourismo_room', $list->upload_id) }}">Explore</a>
</div>

            </div>
          </div>
          </div>
          @endforeach

    </div>
  </div>
</section>


<!-- -------------------------------------------- -->



<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

      <h3 class="uk-heading-bullet">Hotels<span class="uk-heading-ext">
            Explore 
        <span uk-icon="chevron-right"></span></span></h3>

          @foreach($hotel as $list)
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

      <h3 class="uk-heading-bullet">Tour Packages 
        <span class="uk-heading-ext">
            Explore 
        <span uk-icon="chevron-right"></span></span></h3>

          @foreach($hotel as $list)
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
