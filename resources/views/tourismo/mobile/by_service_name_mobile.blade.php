@extends('layouts.tourismo.ui_mobile')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">

<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

@section('content')
<style type="text/css">
.mobile-nav-icon{
    display: none!important;
  }
  #fix-bottom{
    z-index: 999;
    position: fixed;
    width: 100%;
    bottom: 5px;
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
  .list-group-item.active{
    color:white!important;
    background-color: #4e2671!important;
    border: solid 1px #4e2671 !important;
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
  #main {
    margin-top: 0px!important;
  }
/* slick css */
.slider-nav , .slick-slide{
   margin: 0 5px;
 }
 .slick-prev:before {
  color: #4e2671 !important;
  background-color: #eee;
}
.slick-prev, .slick-next{
}
.slick-next:before {
  color: #4e2671 !important;
  background-color: #eee;
}
.slick-prev {
    left: -15px!important;
}
.slick-next {
    right: -15px!important;
}
</style>


<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="slider-for">
          @foreach($byphotos as $list)
          <div>
            <img src="/image/tour/2021/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt="" >
          </div>
          @endforeach
        </div>
        <!-- slick js img  -->
      </div>
      <div class="col-12 mt-3 mb-0">
        <div class="slider-nav px-2">
          @foreach($byphotos as $list)
          <div>
            <img src="/image/tour/2021/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt="" >
          </div>
          @endforeach
        </div>
        <!-- slick js img  -->
      </div>
     
      <div class="col-6">
        <h3>{{ $byname[0]->tour_name }}</h3>
        <p style="margin-top: -19px;font-size: 12px;"><i class="fas fa-building"></i> 
          {{ $byname[0]->company }}</p>
        
        <p style="margin-top: -19px;font-size: 12px;"><i class="fas fa-map-marker-alt"></i> 
          {{ $byname[0]->address }}
        </p>
        <p style="margin-top: -15px;font-size: 12px;"><i class="fas fa-star"></i> | 0 Reviews | 0 Book</p>
        @if($byname[0]->description == 'hotel_and_resort')
  
        <p style="margin-top: -5px;font-size: 14px;"><i class="fas fa-cloud-moon"></i>
            No. of night :{{ $byname[0]->nonight }}
        </p>
        <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-eye"></i>
            View: {{ $byname[0]->viewdeck }}
        </p>
        <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-user-tie"></i>
            Max guest: {{ $byname[0]->noguest }}
        </p>
        <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-person-booth"></i>
            Room size: {{ $byname[0]->roomsize }}
        </p>

        @elseif($byname[0]->description == 'tour_operator')

        <p style="margin-top: -5px;font-size: 14px;"><i class="fas fa-cloud-moon"></i>
            No. of night :{{ $byname[0]->nonight }}
        </p>
        <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-user-tie"></i>
            Max guest: {{ $byname[0]->noguest }}
        </p>

        @elseif($byname[0]->description == 'exclusive')

        <p style="margin-top: -5px;font-size: 14px;"><i class="fas fa-cloud-moon"></i>
            No. of night :{{ $byname[0]->nonight }}
        </p>
        <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-user-tie"></i>
            Max guest: {{ $byname[0]->noguest }}
        </p>
        
        @else
          <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-person-booth"></i>
            Category is not exist.
        </p>
        @endif
      </div>
      <!-- /.col -->
      <div class="col-6">
        <div class="text-center mt-1" style="background-color:#f4f4f4; padding: 0 1rem;">
        <p  style="font-size:1rem;font-weight:700;color:#f7442e">₱ {{ $byname[0]->price }}</p>
        </div>
        <!-- /.price -->
        <p class="my-1" style="font-size:.7rem;">
          {{ $byname[0]->name }} » {{ $byname[0]->country }} » {{ $byname[0]->district }}
        </p>
        
        </div>
      </div>
      <!-- /.col -->
      <div class="col-12 mt-2">
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Inclusion
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">{{ $byname[0]->tour_desc }}</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                What to Expect
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">{{ $byname[0]->tour_expect }}</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              Cancelation and Refund Policy
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">{{ $byname[0]->tour_desc }}</div>
            </div>
          </div>
        </div>
        <!-- /.accord -->
      </div>
      <!-- /.col -->
      <div class="col-12">
        <strong>More Details</strong>
          <div class="row">
            <div class="col-12">
              <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active " id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">About</a>
                <a class="list-group-item list-group-item-action " id="list-profile-list" data-bs-toggle="list" href="#list-reviews" role="tab" aria-controls="list-reviews">Reviews</a>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                  <p class="text-muted" style="font-size: 14px;">
                  {{ $byname[0]->about }}
                  </p>
                </div>
                <div class="tab-pane fade" id="list-reviews" role="tabpanel" aria-labelledby="list-reviews-list">...</div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /.section -->


<div class="postion-relative">
  <div id="fix-bottom">
    <div class="row g-1 mx-2">
      <div class="col-6">
        <div class="d-grid gap-2">
          @if(Auth::check())
          @auth
            <a href="{{ route('book',[$byname[0]->description,$byname[0]->country,$byname[0]->district,$byname[0]->tour_name]) }}" class="btn btn-block btn-warning btn-flat">Book Now</a>
            @endauth
          @else
          <a href="javascript:void(0)" uk-toggle="target: #login" class="btn btn-block btn-warning btn-flat">Book Now</a>
          @endif
        </div>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <div class="d-grid gap-2">
            <button type="button" class="btn btn-block btn-primary btn-flat" disabled="disabled">Share</button>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- row relative -->
  </div>
</div>
<!-- relative -->




@endsection

@section('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  $(document).ready(function(){
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: false,
      centerMode: true,
      focusOnSelect: true,
      centerPadding: '60px',
    });
            


  });
</script>
@endsection