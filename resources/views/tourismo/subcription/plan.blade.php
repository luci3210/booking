@extends('layouts.tourismo.ui')
@section('content')

@if(Auth::check())
    @auth
      <!-- ---------------------------- user is authenticated ----------------- -->
    @endauth
@else 
<div id="checklogin" class="uk-modal-full" uk-modal>
<div class="uk-modal-dialog">
<button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center"><img src="{{ asset('image/logo/logoab.png') }}"></h3>
                        <div class="uk-lg-margin"></div>
    <form method="POST" action="{{ route('login') }}">
      @csrf
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input class="uk-input uk-form-meduim" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input uk-form-meduim" type="password" name="password" required autocomplete="current-password">  
            </div>
        </div>

        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label class="uk-text-small"><input class="uk-checkbox" type="checkbox"> Remember Me</label>
        </div>

        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-default uk-button-meduim uk-width-1-1">Login</button>
        </div>
        <div class="uk-text-small uk-text-center">
             No account yet? <a href="#register" uk-toggle><b>Register</b></a>
        </div>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

@endif


<main id="main">
<div class="uk-top-margin"></div>
<section class="pricing" data-aos="fade-up">
  <div class="container">

    <div class="section-title">
      <h2><b>Become a Merchant </b></h2>
      <p>
        With over 7,000 islands that make up the archipelago of the Philippines, a constant challenge for travelers is to figure out where to explore first. One thing's for sure - there's something to see for every type of traveler.
      </p>
    </div>

    <div class="row">

      @forelse($plan as $plans)

      <div class="col-lg-4 box">

        <h3>{{ $plans->plan_name }}</h3>
        <h4>P {{ $plans->plan_price }}<span>{{ $plans->plan_scope }}</span></h4>
        
        <ul>

          @foreach(explode(',', $plans->plan_package) as $package) 
          <li><i class="bx bx-check"></i> {{ $package }}</li>
          @endforeach
        
        </ul>

        @if(Auth::check())
        @auth

        <a class="uk-button uk-button-default" href="{{ route('subscribe-steps',$plans->id) }}">
          Subscribe Now
        </a>

        @endauth
        @else 

        <a class="uk-button uk-button-default" href="javascript:void(0)" uk-toggle="target:#register">
          Subscribe Now
        </a>

        @endif

      </div>

      @endforeach

    </div>

    <br>
    <br>

  </div>
</section>

</main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
@endsection
