@extends('layouts.tourismo.ui-user')
@section('content')

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="{{ route('myhome') }}">Home</a></li>
            <li>Settings</li>
          </ol>
        </div>

      </div>
    </section>

    <!-- <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200"> -->
<section>
<div class="container">

<div class="row">
<div class="col-md-3">
@include('layouts.tourismo.menu')
</div>


<div class="col-md-9">
  <div class="card card-primary card-outline">

    <div class="pricing-title">
          <h2>Pricing Table</h2>
          <p>Explore some of the best tips from around the city from our partners and friends.</p>
        </div>

<div class="card-body">
  <div class="tab-content">
    <div class="active tab-pane" id="activity">

      <div class="post">        


    <section class="services">
      <div class="container">
        
        <div class="row">

    @forelse($plan as $plans)


          <div class="col-md-6 col-lg-4 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-file"></i></div>

              <h4 class="title"><a href="">{{ $plans->plan_name }}</a></h4>
              <h3>P {{ $plans->plan_price }}</h3>
              
                  @foreach(explode(',', $plans->plan_package) as $package) 
                    <p class="description"><span uk-icon="check"></span> {{ $package }}</p>
                  @endforeach
                  <br>
                  <button type="submit" class="btn btn-primary">Subcribe</button>
            </div>
          </div>

    @empty
      <p> No listing found!</p> 
    @endforelse

        </div>

      </div>
    </section>


      </div>

    </div>
  </div>
</div>

</div>
</div>

</div>
</section>

@endsection
