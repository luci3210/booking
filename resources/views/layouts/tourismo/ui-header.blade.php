
<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <!-- <h1 class="text-light"><a href="{{ route('myhome') }}"><span><img src="{{ asset('image/logo/logo.png') }}"></span></a></h1> -->
        <a href="{{ route('myhome') }}"><span><img src="{{ asset('image/logo/logo.png') }}"></span></a>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html"><b>Download App</b></a></li>
          @if(empty($merchant_plan))
          <li class="active"><a href="{{ route('other-plan') }}"><b>Plan</b></a></li>
          @else
          <li class="active"><a href="{{ route('m-user') }}"><b>Merchant</b></a></li>
          @endif
          <li><a href="services.html">Recently Veiw</a></li>
          <li><a href="portfolio.html">Cart</a></li>
@if (Route::has('login'))

@auth
    <li class="drop-down"><a href="">Account</a>
      <ul>
        <li><a href="#">Drop Down 1</a></li>
        <li class="drop-down"><a href="#">Drop Down 2</a>
          <ul>
            <li><a href="#">Deep Drop Down 1</a></li>
            <li><a href="#">Deep Drop Down 2</a></li>
            <li><a href="#">Deep Drop Down 3</a></li>
            <li><a href="#">Deep Drop Down 4</a></li>
            <li><a href="#"><span uk-icon="heart"></span> Settings</a></li>
          </ul>
        </li>
        <li><a href="#">Drop Down 3</a></li>
        <li><a href="#">Drop Down 4</a></li>
        <li><a href="{{ route('account-setting') }}"><span uk-icon="settings"></span> Settings</a></li>
      </ul>
    </li>
    <li><a href="{{ route('logout') }}">Signout</a></li>
@else
    <li><a href="#login" uk-toggle>Login</a></li>

    @if (Route::has('register'))
        <li><a href="{{ route('register') }}" uk-toggle>Register</a></li>
        <!-- <li><a href="#register" uk-toggle>SignUp</a></li> -->
    @endif
@endauth

@endif
<li><a href="portfolio.html">Help</a></li>
</ul>
</nav>
</div>



<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>
        <ol>
            @foreach($slmenu as $list)
            <li><a href="index.html"><span uk-icon="heart"></span> {{ $list->name }}</a></li>
            @endforeach()
        </ol>
    </h2>
      <!-- <ol>
        <li><a href="index.html">Home</a></li>
        <li>Contact</li>
      </ol> -->
    </div>
  </div>
</section>


</header>



<!-- INMOD -->
<div id="login" class="uk-modal-full" uk-modal>
<div class="uk-modal-dialog">
<button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center">Booking Tourismo</h3>
                        
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
            <label><input class="uk-checkbox" type="checkbox"> Remember Me</label>
        </div>

        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-primary uk-button-meduim uk-width-1-1">Login</button>
        </div>
        <div class="uk-text-small uk-text-center">
            Not registered? <a href="#register" uk-toggle>Register</a>
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



<!-- REGMOD -->
<div id="register" class="uk-modal-full" uk-modal>
<div class="uk-modal-dialog">
<button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center">Booking Tourismo</h3>
                        
    <form>
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input class="uk-input uk-form-meduim" type="text" placeholder="Name">
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input class="uk-input uk-form-meduim" type="text" placeholder="Email">
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input uk-form-meduim" type="password" placeholder="Password">  
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input uk-form-meduim" type="password" placeholder="Re-Enter Password">  
            </div>
        </div>

        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label><input class="uk-checkbox" type="checkbox"> Remember Me</label>
        </div>

        <div class="uk-margin">
            <button class="uk-button uk-button-primary uk-button-meduim uk-width-1-1">Register</button>
        </div>
        <div class="uk-text-small uk-text-center">
            Forgot password? <a href="#login" uk-toggle>Click me!</a>
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

