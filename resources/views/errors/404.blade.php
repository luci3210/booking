@extends('layouts.tourismo.ui')
@section('content')

<section class="services team aos-init aos-animate" style="min-height: 80vh;" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">



<div class="text-center"><br>
<h1>Whoops!</h1>
<h2 class="text-danger">{{ $exception->getMessage() }}</h2>
</div>



    </div>
  </div>
</section>

@endsection
