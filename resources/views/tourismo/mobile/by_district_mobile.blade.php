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
</style>
@section('content')


<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" >
  <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2><b><a href="{{ route('destination') }}" class="uk-link"> </a>{{ $bydistrict[0]->country }} - {{ $bydistrict[0]->district }} </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore our Rooms and Packages</a></span></h2>
            </div>
        </div>
        <!-- /.col -->
        @foreach($bydistrict as $list)
        <div class="col-6">
            <div class="icon-box icon-box-pink">
    
              

                <div class="member-img">
                    <a  href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
                    <img src="/image/cover/2021/{{ $list->cover == '' ? 'default.png' : $list->cover }}" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="member-info">
                    <div >
                        <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}" class="mem-title title-package" >{{ $list->tour_name }}</a><br>
                        <span style="margin-top: -8px;font-size: 12px;color:#5f5e5e"><i class="fas fa-star"></i> | 0 Reviews</span>
                        <p class="text-price text-left my-0" style="color:#f6412d">₱ {{ $list->price }}</p>
                    </div>
                </div>
                <!-- /.mem info -->
                <div class="row g-1 px-1 my-2">
                    <div class="col-6">
                    <div class="d-grid gap-2">
                        <a class="uk-button uk-button-small btn-room-details-m mb-sm-1 theme-btn" href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
                        Explore
                        </a>
                    </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                    <div class="d-grid gap-2">
                        <a class="uk-button uk-button-small mb-sm-1 theme-btn" href="javascript:void(0)"uk-toggle="target: #prov-{{$list->upload_id}}">
                        Share
                        </a>
                    </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- row -->
               
            </div>
            <!-- /.pink box -->
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