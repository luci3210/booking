<style>

/* .nav-height{
    min-height: 10vh;
} */

.nav-main{
    box-shadow: 0px 1px #8e8e8e38 !important;
}
/* .col-lg-6{
    width: 50%;
} */
.hidden-xl{
    display: none;
}
.block-xl{
    display: block;
}
/* .col-12{
    width: 100%;
} */
.pd-2{
    padding: 2px 2px;
}
.uk-navbar-container,.uk-navbar-transparent{
    background-color: #ffffff!important;
}
.hide-xl{
    display: none!important;
}
.nav-main{
    background-color: #ffffff!important;
}

@media only screen and (min-width: 982px) {
    .icon-div{
        padding-left: 0;
    }

}
@media only screen and (max-width: 992px) {
    .hidden-m{
        display: none;
    }
    .block-l{
        display: block!important;
    }
    .mobile-nav-toggle{
        margin-top: 10px;
    }
    .uk-navbar-right.nav-menu {
        display: none!important;
    }
}

@media only screen and (max-width: 650px) {
    .hidden-m{
        display: none;
    }
    .mobile-nav-toggle{
        margin-top: 20px;
    }
    /* .col-sm-12{
        width: 100%;
    } */
    .hidden-sm{
        display: none!important;
    }
    .block-sm{
        display: block;
    }
    .search-mt-1{
        margin-top: -1px;
        padding-left: 5px;
        padding-right: 5px;
    }
    
    .min-vh-30{
        height: 30vh!important;
    }
    .sm-m-view{
        margin: 0px 0 20px 10px;
    }
    
}
/* pixel 2 */
@media only screen and (max-width: 414px) {
    .hidden-m{
        display: none!important;
    }
    .mobile-nav-toggle{
        margin-top: 20px;
    }
    /* .col-sm-12{
        width: 100%;
    } */
    
    .hidden-sm{
        display: none!important;
    }
    
}

/* pixel 2 */
@media only screen and (max-width: 375px) {
    
    .mobile-nav-toggle{
        margin-top: 15px;
    }
}

@media only screen and (max-width: 360px) {
    .hidden-xs{
        display: none;
    }
    .mobile-nav-toggle{
        margin-top: 10px;
    }
    /* .col-sm-12{
        width: 100%;
    } */
    .hidden-sm{
        display: none;
    }
}

</style>

<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky" class="nav-main" id="header">
<nav class="fixed-top uk-navbar-container nav-height uk-container" uk-navbar>
    
    <div class="uk-navbar-left sm-m-view">
        <div class="uk-grid" uk-grid>
            <div class="col-lg-6 col-sm-12 icon-div">
                <a href="{{ route('myhome') }}">
                    <span>
                        <img src="{{ asset('image/logo/logoab.png') }}"  style="padding-top: 5px; padding-right: 20px;">
                    </span>
                </a>
            </div>
            <div class="col-lg-6 hidden-sm">
                <form class="">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="border-radius: 23px;">
                </form>
            </div>
        </div>
    </div>
  

    <div class="uk-navbar-right nav-menu ">

        <ul class="">
             <li class="active"><a href="index.html"><i class="fas fa-mobile-alt"></i> <b>Download App</b></a></li>
             @if(empty($merchant_plan))
          <li class="active"><a href="{{ route('other-plan') }}"><i class="far fa-building"></i> <b>Merchant</b></a></li>
          @else
          <li class="active"><a href="{{ route('m-user') }}"><i class="far fa-building"></i> <b>Plan</b></a></li>
          @endif
            @if (Route::has('login'))

            @auth
                <li class="drop-down"><a href=""><i class="fas fa-user-circle"></i> Account</a>
                <ul>
                    <li><a href="{{ route('accnt_profile') }}">Profile</a></li>
                    <li><a href="#">Booking </a></li>
                    <li><a href="#">Like Page</a></li>
                    <li><a href="{{ route('account-setting') }}"><span uk-icon="settings"></span> Settings</a></li>
                    <li><a href="#">LogOut</a></li>
                </ul>
                </li>
                <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Signout</a></li>
            @else

                @if (Route::has('register'))
                <!-- <li><a href="{{ route('register') }}" uk-toggle>SignUp</a></li> -->

                    <li><a href="#register" uk-toggle>SignUp</a></li>
                @endif
                <li><a href="#login" uk-toggle>Login</a></li>
            @endauth

            @endif
        </ul>

    </div>


</nav>
<div class="col-lg-12 pd-2 hidden-xl block-sm uk-navbar-container search-mt-1">
    <form class="">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="border-radius: 23px;">
    </form>
</div>

</div>
<!-- /.nav -->

<!-- registration -->
<div id="register" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>
        <div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
            <div class="uk-width-1-1">
                <div class="uk-container">
                    <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                        <div class="uk-width-1-1@m">
                            <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                                <h3 class="uk-card-title uk-text-center">Tourismo</h3>
                                <p class="login-box-msg uk-text-center">Register a new membership</p>

                                <form method="post" action="{{ route('register') }}" id="reg-form">
                                @csrf
                                    <div class="uk-margin err">
                                        <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                                            <input class="uk-input uk-form-meduim" placeholder="Full name" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus>
                                        </div> 
                                        <span class="err uk-width-1-1"></span>
                                        @error('name')
                                        <span class="invalid-feedback " role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="uk-margin err">
                                        <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                            <input class="uk-input uk-form-meduim" placeholder="Email"  type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                        <span class="err uk-width-1-1"></span>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="uk-margin err">
                                        <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                            <input class="uk-input uk-form-meduim" type="password" id="reg-pass" name="password" placeholder="Password" required autocomplete="current-password">  
                                        </div>
                                        <span class="err uk-width-1-1"></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="uk-margin err">
                                        <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                            <input class="uk-input uk-form-meduim" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="current-password">  
                                        </div>
                                        <span class="err uk-width-1-1"></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid err">
                                        <label><input class="uk-checkbox" name="terms" type="checkbox"> I aggree in terms</label>
                                        <span class="err uk-width-1-1"></span>
                                    </div>

                                    <div class="uk-margin">
                                        <button type="submit" class="uk-button uk-button-primary uk-button-meduim uk-width-1-1">Login</button>
                                    </div>
                                    <div class="uk-text-small uk-text-center text-dark">
                                        <a href="#register" uk-toggle class="text-dark">Not registered? Register</a>
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
<!-- /. registration -->

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
                                <form method="POST" action="{{ route('login') }}" id="login-form">
                                @csrf
                                    <div class="uk-margin err">
                                        <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                            <input class="uk-input uk-form-meduim" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                        <span class="err uk-width-1-1"></span>
                                    </div>

                                    <div class="uk-margin err">
                                        <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                            <input class="uk-input uk-form-meduim" placeholder="Password" type="password" name="password" required autocomplete="current-password">  
                                        </div>
                                        <span class="err uk-width-1-1"></span>
                                    </div>

                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                        <label><input class="uk-checkbox" type="checkbox"> Remember Me</label>
                                    </div>

                                    <div class="uk-margin">
                                        <button type="submit" class="uk-button uk-button-primary uk-button-meduim uk-width-1-1">Login</button>
                                    </div>
                                    <div class="uk-text-small uk-text-center text-dark">
                                    <a href="#register" uk-toggle class="text-dark">Not registered? Register</a>
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

