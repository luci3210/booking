@extends('layouts.tourismo.ui')
@section('banner')
  
  <!-- ======= Hero Section ======= -->

<!--   <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

    @foreach($hotel as $list)
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Moderna</span></h2>
          <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
        </div>
      </div>
    @endforeach()
    
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section> -->



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

  <!-- End Hero -->
@endsection

@section('content')

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

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
<a class="uk-button uk-button-default uk-button-small btn-room-details-m" href="javascript:void(0)" data-id="{{ $list->upload_id }}">Explore</a>
<button class="uk-button uk-button-default uk-button-small" type="button" data-toggle="modal" data-id="{{ $list->id }}" id="btn-room-details-m">Details</button>

</div>

            </div>
          </div>
          </div>
          @endforeach

    </div>
  </div>
</section>


<!-- -------------------------------------- -->


<section class="page-breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Hotels</h2>
      <ol>
        <li><a href="index.html">Explore <span uk-icon="chevron-right"></span></a></li>
      </ol>
    </div>

  </div>
</section>



<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

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
<a class="uk-button uk-button-default uk-button-small btn-room-details-m" href="javascript:void(0)" data-id="{{ $list->upload_id }}">Explore</a>
<button class="uk-button uk-button-default uk-button-small" type="button" data-toggle="modal" data-id="{{ $list->id }}" id="btn-room-details-m">Details</button>

</div>

            </div>
          </div>
          </div>
          @endforeach

    </div>
  </div>
</section>


<!-- -------------------------------------------- -->



<section class="page-breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Hotels</h2>
      <ol>
        <li><a href="index.html">Explore <span uk-icon="chevron-right"></span></a></li>
      </ol>
    </div>

  </div>
</section>



<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

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
<a class="uk-button uk-button-default uk-button-small btn-room-details-m" href="javascript:void(0)" data-id="{{ $list->upload_id }}">Explore</a>
<button class="uk-button uk-button-default uk-button-small" type="button" data-toggle="modal" data-id="{{ $list->id }}" id="btn-room-details-m">Details</button>

</div>

            </div>
          </div>
          </div>
          @endforeach

    </div>
  </div>
</section>


<section class="page-breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Hotels</h2>
      <ol>
        <li><a href="index.html">Explore <span uk-icon="chevron-right"></span></a></li>
      </ol>
    </div>

  </div>
</section>



<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

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
<a class="uk-button uk-button-default uk-button-small btn-room-details-m" href="javascript:void(0)" data-id="{{ $list->upload_id }}">Explore</a>
<button class="uk-button uk-button-default uk-button-small" type="button" data-toggle="modal" data-id="{{ $list->id }}" id="btn-room-details-m">Details</button>

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
