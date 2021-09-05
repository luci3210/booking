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
    .title-name{
        font-weight: 700;
        font-size: 15px;
    }
    .img-fluid {
        max-width: 100%;
        width: 100%;
        height: 150px!important;
        position: center;
    }
    .desc-text{
        font-size: 11px;
    }
</style>
@section('content')


<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" >
  <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2><b><a href="#" class="uk-link"> </a>{{ $country }} </b></h2>
            </div>
        </div>
        <!-- /.col -->
        @foreach($exploreData as $list)
        <div class="col-6">
            <div class="icon-box icon-box-pink">
                <div class="member-img">
                    <a  href="{{ route('by_district',[$list->country,$list->destination_info]) }}">
                    <img src="{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="member-info">

                    <h6 class="my-1 title-name" >{{ $list->destination_info }}</h6>

                    <h6 class="my-1 desc-text">
                    <i class="fas fa-building"></i> No. of hotels : 150 {{ $list->country }}
                    </h6>

                    <h6 class="my-1 desc-text">
                    <i class="fas fa-directions"></i> No. of Tour Operators : 251
                    </h6>

                    <div class="row g-1 px-1 my-2">
                    <div class="col-12">
                        <div class="d-grid gap-2">
                        <a class="uk-button uk-button-small theme-btn mb-sm-1" href="{{ route('by_district',[$list->country,$list->destination_info]) }}">
                            Explore
                        </a>
                        </div>
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- row -->
                </div>
               
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