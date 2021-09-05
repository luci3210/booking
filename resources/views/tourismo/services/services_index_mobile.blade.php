@extends('layouts.tourismo.ui_mobile')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<style>
    #main {
        margin-top: -40px!important;
    }
    .text-price {
        color:#ff2f00 !important;
        font-size: 12px !important;
        font-weight: 700 !important;
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
  .vh-100{
      min-height: 100vh;
  }
  .img-fluid {
    max-width: 100%;
    width: 100%;
    height: 100px!important;
    position: center;
  }
  .title-name{
      font-weight: 700;
      font-size: 15px;
  }
</style>
@section('content')


<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" >
  <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
            </div>
        </div>
        <!-- /.col -->
        @foreach($data as $list)
        <div class="col-6">
            <div class="icon-box icon-box-pink">
                
                <div class="member mb-0">

                    <div class="member-img">
                        <a  href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
                        <img src="{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" class="img-fluid" alt="">
                        </a>
                    </div>

                    <div class="member-info">

                        <h6 class="my-1 title-name" >{{ $list->tour_name }}</h6>

                        <!-- <h6 class="my-1">
                            <i class="fas fa-building"></i>
                        </h6> -->

                        <h6 class="my-1" style="color:#f6412d;font-size: 14px;font-weight: 650">₱ {{ $list->price }}</h6>

                        <div class="row g-2 px-1 my-1">
                        <div class="col-6">
                            <div class="d-grid gap-2">
                            <a class="uk-button uk-button-small theme-btn mb-sm-1" href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
                                Explore
                            </a>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <div class="d-grid gap-2">
                            <a class="uk-button uk-button-small theme-btn mb-sm-1" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#global-share"  onclick="openShare('{{$list}}')">
                                Share
                            </a>
                            </div>
                        </div>
                        <!-- /.col -->
                        </div>
                        <!-- row -->
                    </div>
                </div>
                </div>
        </div>
        <!-- /.col -->
        @endforeach
    </div>
  </div>
</section>






@endsection

@section('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

@endsection