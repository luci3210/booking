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
.shadow{
    border: 1px solid #dbd9d9;
    border-radius: 4px;
    margin: .5rem .5rem;
    box-shadow: 1px 7px 8px -5px rgba(0,0,0,0.49);
    -webkit-box-shadow: 1px 7px 8px -5px rgba(0,0,0,0.49);
    -moz-box-shadow: 1px 7px 8px -5px rgba(0,0,0,0.49);
}

/* // fold devices (200px and up) */
@media (min-width: 200px) { 

}
/* // xs devices (320px and up) */
@media (min-width: 320px) { 
    
}
/* // sm devices (360px and up) */
@media (min-width: 360px) { 
    .title-tour{
        padding: .2rem .2rem;
        font-size: 1rem!important;
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
@section('content')

<section class="">
    <div class="row g-0 px-3">
        <div class="col-12">
            <h6 class="title-sections">Tourismo Exclusives</h6>
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 ">
                            @foreach($exclusive_packages as $list)
                            <li>
                                <div class="uk-card uk-card-default shadow">
                                    <div class="uk-card-media-top">
                                        <div style="width: 100%; 
                                        background-size: cover;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        height: 10rem;
                                        background-image: url('{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}');
                                        "></div>
   
    
                                        <!-- <img src="{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt=""  style="border-radius: 4px;"> -->
                                    </div>
                                    <div class="">
                                        <h3 class="title-tour text-nowrap">{{ $list->tour_name }}</h3>
                                        <p></p>
                                    </div>
                                </div>
                            </li>
                             @endforeach
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                    <!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul> -->

                </div>
        </div>
    </div>
</section>

@endsection

@section('js')
@endsection


