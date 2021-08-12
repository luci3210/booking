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
                <h2><b><a href="{{ route('destination') }}" class="uk-link"> </a>International  </b> </h2>
            </div>
        </div>
        <!-- /.col -->
        @foreach($country as $list)
        <div class="col-6">
            <div class="icon-box icon-box-pink">
    
              

                <div class="member-img">
                    <a  href="#">
                        <img src="/image/destination/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="">
                    <a href="" class="mem-title title-package px-1">
                        @if(strlen($list->destination_info) <= 39 )
                            {{ $list->destination_info }}
                        @else
                            {{ $list->destination_info}}
                        @endif
                    </a>
                    <p class="elips-3 desc my-0">
                        @if(strlen($list->destination_desc) <= 70 )
                        {{ substr($list->destination_desc,0,70) }}
                        @else
                        {{ substr($list->destination_desc,0,70) }}...
                        @endif

                    </p>
                </div>
                <!-- /.mem info -->
                <div class="row g-1 px-1 my-2">
                    <div class="col-6">
                    <div class="d-grid gap-2">
                        <a class="uk-button uk-button-small btn-room-details-m mb-sm-1 theme-btn" href="#">
                        Explore
                        </a>
                    </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                    <div class="d-grid gap-2">
                        <a class="uk-button uk-button-small mb-sm-1 theme-btn" href="javascript:void(0)"uk-toggle="target: #">
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