@extends('layouts.tourismo.ui_mobile')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<style>
#main{
    margin-top: -40px!important;
}
.title-sections{
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 10px;
    padding-bottom: 10px;
    position: relative;
}
.shadow-cards{
    border-radius: 4px;
    margin: .5rem .5rem;
    border-radius: 10px;
    box-shadow: 0px 5px 5px 0px rgba(90,90,90,0.5);
    -webkit-box-shadow: 0px 5px 5px 0px rgba(90,90,90,0.5);
    -moz-box-shadow: 0px 5px 5px 0px rgba(90,90,90,0.5);
}
.elips{
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: inline;
}

/* // fold devices (200px and up) */
@media (min-width: 200px) { 
    .title-tour{
        margin-top: 10px;
        padding: .2rem .2rem;
        font-size: 1rem!important;
        line-height: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .review-tour{
        padding: .2rem .2rem;
        line-height: 10px;
        font-size: .8rem!important;
        font-weight: 400!important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .book-tour{
        padding: .2rem .2rem;
        line-height: 10px;
        font-size: .8rem!important;
        font-weight: 400!important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .badge-floats{
        position: absolute;
        left: 5px;
        top: 12.5rem;
        width: 5rem;
    }
    .ex-holder{
        height: 13rem;
    }

}
/* // xs devices (320px and up) */
@media (min-width: 320px) { 
    .title-tour{
        margin-top: 10px;
        padding: .2rem .2rem;
        font-size: 1rem!important;
        line-height: 10px;
    }
    .review-tour{
        padding: .2rem .2rem;
        line-height: 10px;
        font-size: .7rem!important;
        font-weight: 400!important;
    }
    .book-tour{
        padding: .2rem .2rem;
        line-height: 10px;
        font-size: .7rem!important;
        font-weight: 400!important;
    }
    .badge-floats{
        position: absolute;
        left: 5px;
        top: 12.5rem;
        width: 5rem;
    }
    .ex-holder{
        height: 12rem;
    }
    
    
}
/* // sm devices (360px and up) */
@media (min-width: 360px) { 
    .title-tour{
        margin-top: 10px;
        padding: .2rem .2rem;
        font-size: 1rem!important;
        line-height: 10px;
    }
    .review-tour{
        padding: .2rem .2rem;
        line-height: 10px;
        font-size: .7rem!important;
        font-weight: 400!important;
    }
    .book-tour{
        padding: .2rem .2rem;
        line-height: 10px;
        font-size: .7rem!important;
        font-weight: 400!important;
    }
    .badge-floats{
        position: absolute;
        left: 5px;
        top: 12.5rem;
        width: 5rem;
    }
    .ex-holder{
        height: 13rem;
    }
    
}

/* // Medium devices (411px and up) */
@media (min-width: 414px) { 
    .title-tour{
        margin-top: 10px;
        padding: .2rem .2rem;
        font-size: 1rem!important;
        line-height: 10px;
    }
    .review-tour{
        padding: .2rem .2rem;
        line-height: 10px;
        font-size: .7rem!important;
        font-weight: 400!important;
    }
    .book-tour{
        padding: .2rem .2rem;
        line-height: 10px;
        font-size: .7rem!important;
        font-weight: 400!important;
    }
    .badge-floats{
        position: absolute;
        left: 5px;
        top: 12.5rem;
        width: 5rem;
    }
    .ex-holder{
        height: 14rem;
    }
    
}
</style>
@section('content')


<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" >
  <div class="container">
    <div class="row g-1">
        <div class="col-12">
            <div class="section-title">
                <h2><b><a href="{{ route('destination') }}" class="uk-link"> </a>{{ $bydistrict[0]->country }} - {{ $bydistrict[0]->district }} </b> <span style="font-size: 15px;padding-left: 25px;"><a href="{{ route('tour_operator') }}" class="uk-link"><i class="fas fa-chevron-right"></i> Explore our Rooms and Packages</a></span></h2>
            </div>
        </div>
        <!-- /.col -->
        @foreach($bydistrict as $list)
        <div class="col-6">
        <div class=" shadow-cards">
            <a  href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
                <div class="uk-card-media-top">
                    <div class="ex-holder" style="width: 100%; 
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-image: url('{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}');
                    border-top-left-radius: 10px!important;
                    border-top-right-radius: 10px!important;"></div>
                </div>
                <div class="px-2 pb-1">
                    <h3 class="title-tour text-nowrap mb-0 ">{{ $list->tour_name }}</h3>
                    <h3 class="review-tour text-nowrap mb-0 mt-0"><i class="fas fa-star text-warning"></i>{{ $list->upload_id + 1 }} <span class="text-muted">(reviews 3,2320)</span></h3>
                    <h3 class="book-tour text-nowrap  mt-0 text-dark">800k+ Booked</h3>
                </div>
            </a>
        </div>
        </div>
        
        @endforeach
    </div>
  </div>
</section>






@endsection

@section('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

@endsection