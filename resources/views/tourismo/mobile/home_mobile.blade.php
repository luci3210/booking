@extends('layouts.tourismo.ui_mobile')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">

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

/* // lg devices (tablets, 480px and up) */
@media (min-width: 480px) { 
    .ex-holder{
        height: 15rem;
    }
}

/* // sm web devices (tablets, 576px and up) */
@media (min-width: 576px) { 
    .ex-holder{
        height: 16rem;
    }

}
</style>
@section('content')

<section id="exclusives" class="">
    <div class="row g-0 px-3">
        <div class="col-12">
            <h6 class="title-sections px-2">Tourismo Exclusives</h6>
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 ">
                            @foreach($exclusive_packages as $list)
                            <li>
                            <a href="{{ route('by_name',[$list->description,$list->country,$list->district,$list->tour_name]) }}">
                                <div class=" shadow-cards">
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
                                </div>
                            </a>
                            </li>
                             @endforeach
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- /.exclusive -->



<section id="local" class="">
    <div class="row g-0 px-3">
        <div class="col-12">
            <h6 class="title-sections px-2">Local Destination</h6>
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 ">
                            @foreach($destination as $list)
                            <li>
                            <a href="{{ route('by_district',[$icountry->country,$list->destination_info]) }}">
                                <div class=" shadow-cards">
                                    <div class="uk-card-media-top">
                                        <div style="width: 100%; 
                                        background-size: cover;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        height: 15rem;
                                        background-image: url('{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}');
                                        border-top-left-radius: 10px!important;
                                        border-top-right-radius: 10px!important;
                                        border-bottom-left-radius: 10px!important;
                                        border-bottom-right-radius: 10px!important;
                                        ">
                                        <div class="position-relative elips">
                                            <span class="badge badge-pill badge-light bg-light text-dark badge-floats elips">{{ $list->destination_info }}</span>
                                        </div>      
                                    </div>
                                    </div>
                                </div>
                            </a>
                            </li>
                             @endforeach
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- /.local -->





<section id="international" class="">
    <div class="row g-0 px-3">
        <div class="col-12">
            <h6 class="title-sections px-2">international Destination</h6>
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 ">
                            @foreach($international as $list)
                            <li>
                            <a href="{{ route('by_country', $list->country) }}">
                                <div class=" shadow-cards">
                                    <div class="uk-card-media-top">
                                        <div style="width: 100%; 
                                        background-size: cover;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        height: 15rem;
                                        background-image: url('{{ asset('image/destination')}}/{{ $list->destination_image == '' ? 'default.png' : $list->destination_image }}');
                                        border-top-left-radius: 10px!important;
                                        border-top-right-radius: 10px!important;
                                        border-bottom-left-radius: 10px!important;
                                        border-bottom-right-radius: 10px!important;
                                        ">
                                        <div class="position-relative elips">
                                            <span class="badge badge-pill badge-light bg-light text-dark badge-floats elips">{{ $list->destination_info }}</span>
                                        </div>    
                                    </div>
                                    </div>
                                </div>
                            </a>
                            </li>
                             @endforeach
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- /.international -->

<section id="nears" class="">
    <div class="row g-0 px-3">
        <div class="col-12">
            <h6 class="title-sections px-2">Near By Destinations</h6>
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 " id="load-near">
                            <li class="loaders">
                            <a href="#">
                                <div class=" shadow-cards">
                                    <div class="uk-card-media-top">
                                        <div class="content-placeholder" style="width: 100%; 
                                        height: 15rem;
                                        border-top-left-radius: 10px!important;
                                        border-top-right-radius: 10px!important;
                                        border-bottom-left-radius: 10px!important;
                                        border-bottom-right-radius: 10px!important;
                                        ">
                                    </div>
                                    </div>
                                </div>
                            </a>
                            </li>
                            <li class="loaders">
                            <a href="#">
                                <div class=" shadow-cards">
                                    <div class="uk-card-media-top">
                                        <div class="content-placeholder" style="width: 100%; 
                                        height: 15rem;
                                        border-top-left-radius: 10px!important;
                                        border-top-right-radius: 10px!important;
                                        border-bottom-left-radius: 10px!important;
                                        border-bottom-right-radius: 10px!important;
                                        ">
                                    </div>
                                    </div>
                                </div>
                            </a>
                            </li>
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- /.rooms -->



<section id="rooms" class="">
    <div class="row g-0 px-3">
        <div class="col-12">
            <h6 class="title-sections px-2">Partners</h6>
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 ">
                            @for($x=1; $x <= 4; $x++)
                            <li>
                                <div class="mx-2" >
                                    <div class="uk-card-media-top" style="height:100px">
                                        <div style="width: 100%; 
                                        background-size: contain;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        height: 100%;
                                        background-image: url('{{ asset('image/partner')}}/{{$x}}.jpg');
                                        border-top-left-radius: 10px!important;
                                        border-top-right-radius: 10px!important;
                                        border-bottom-left-radius: 10px!important;
                                        border-bottom-right-radius: 10px!important;
                                        ">
                                    </div>
                                    </div>
                                </div>
                            </li>
                            @endfor
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- /.rooms -->

<section id="exclusives" class="">
    <div class="row g-0 px-3">
        <div class="col-12">
            <h6 class="title-sections px-2">Partners </h6>
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 ">
                            @foreach($news as $list)
                            <li>
                                <div class="m-2">
                                    <div class="uk-card-media-top">
                                        <div class="ex-holder" style="width: 100%; 
                                        background-size: cover;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        background-image: url('{{ asset('/image/cover/2021/default.png') }}');
                                        border-top-left-radius: 10px!important;
                                        border-top-right-radius: 10px!important;"></div>
                                    </div>
                                </div>
                            </li>
                             @endforeach
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- /.news -->




@endsection

@section('js')
<script>
getLocation()
</script>

@endsection


<script>

function goToNextPage(url){
    window.location.href=url;
}
</script>

