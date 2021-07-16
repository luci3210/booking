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
    
}

/* // Medium devices (411px and up) */
@media (min-width: 411px) { 
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
    
}

/* // lg devices (tablets, 480px and up) */
@media (min-width: 480px) { 

}

/* // sm web devices (tablets, 576px and up) */
@media (min-width: 576px) { 

}
</style>
@section('content')

<section id="local" class="">
    <div class="row g-0 px-3">
        <div class="col-12">
            <h6 class="title-sections px-2">{{ $data[0]->name }}</h6>
        </div>
        @foreach($data as $list)
        <div class="col-6 col-sm-6 col-md-4" onclick="goToNextPage('{{ route('service_tour_view', $list->upload_id) }}')">
            <div class=" shadow-cards">
                <div class="uk-card-media-top">
                    <div style="width: 100%; 
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    height: 15rem;
                    background-image: url('{{ asset('image/tour/2021')}}/{{ $list->photo == '' ? 'default.png' : $list->photo }}');
                    border-top-left-radius: 10px!important;
                    border-top-right-radius: 10px!important;
                    border-bottom-left-radius: 10px!important;
                    border-bottom-right-radius: 10px!important;
                    ">
                    <div class="position-relative elips">
                        <span class="badge badge-pill badge-light bg-light text-dark badge-floats elips">{{ $list->tour_name }}</span>
                    </div>      
                </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        @endforeach
        
    </div>
</section>
<!-- /.local -->


@endsection

@section('js')
@endsection


<script>
function goToNextPage(url){
    window.location.href=url;
}
</script>

