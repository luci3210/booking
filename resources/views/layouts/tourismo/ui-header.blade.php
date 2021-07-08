<style>

/* .nav-height{
    min-height: 10vh;
} */

.nav-mobile-boxshadow{
    border: 1px solid #dbd9d9;
    border-radius: 4px;
    margin: .5rem .5rem;
    box-shadow: 1px 7px 8px -5px rgba(0,0,0,0.49);
    -webkit-box-shadow: 1px 7px 8px -5px rgba(0,0,0,0.49);
    -moz-box-shadow: 1px 7px 8px -5px rgba(0,0,0,0.49);
}


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
.link-secondary{
    font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
    cursor: pointer;
    color: #443a3a!important;

}

.link-secondary:hover{
    color: #36235a !important;
    font-weight: 600;
    /* background-color: #ececec; */
    border-radius: 70%;
}

.link-secondary-search{
    color: #36235a !important;
    font-weight: 600;
    background-color: #ececec;
    border-radius: 5px;
    font-size: .8em;
    margin-right: 3px;
    text-align: center;
}

.link-secondary-search:hover{
    background-color: #f5f5f5;
}
.link-disabled{
    font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
    font-size: 14px;
    color: #212121!important;
    font-weight: 600;
    cursor:context-menu;
}

.fade-disabled {
    color: grey!important;
}
.search-focus-custom:focus{
    color: #212529;
    background-color: #fff;
    border-color: #36235a;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(54 35 90 / 25%)
}
.border-1{
    height: 1px;
    background-color: #f5f5f5;;
}
.search-img{
    margin-right: 8px;
    -webkit-box-flex: 0;
    flex: 0 0 32px;
    width: 32px;
    height: 32px;
    border-radius: 4px;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-color: #eee;
}
.title-search{
    font-size: .8em;
    font-weight: 700;
}    
.desc-search{
    font-size: .7em;
}

.no-style-list{
    position: relative;
    width: 100%;
    list-style: none;
    margin: 0;
    padding-left: 0;
}
.li-icons{
    display: inline-block;
    position: relative;
    margin-bottom: 0;
}
.figure-caption{
    width: min-content;
}

.card-padding{
    /*padding: 1rem .5rem;*/
    padding: none;
}


@media only screen and (min-width: 982px) {
    .icon-div{
        padding-left: 0;
    }
    .icon-profile{
        font-size: 1.4em;
    }
}

@media only screen and (max-width: 1000px) {
    .item-icon {
        vertical-align: top;
        display: inline-block;
        text-align: center;
        width: 100px;
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
    .item-icon {
      vertical-align: top;
      display: inline-block;
      text-align: center;
      width: 50px;
      margin: 0 10px;
    }
    
}

@media only screen and (max-width: 650px) {
    .item-icon {
      vertical-align: top;
      display: inline-block;
      text-align: center;
      width: 4rem;
      margin: 0 10px;
    }
    .link-secondary {
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
        cursor: pointer;
        font-size: .9rem;
        color: #212121!important;
        font-weight: 600;
        padding: .2rem!important;
    }
    .link-disabled {
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
        font-size: .9rem;
        color: #212121!important;
        font-weight: 600;
        cursor: context-menu;
        padding: .2rem!important;
    }

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


@media only screen and (max-width: 500px) {
    .item-icon {
      vertical-align: top;
      display: inline-block;
      text-align: center;
      width: 4rem;
      margin: 0 10px;
    }
    .link-secondary {
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
        cursor: pointer;
        font-size: .9rem;
        color: #212121!important;
        font-weight: 600;
        padding: .2rem!important;
    }
    .link-disabled {
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
        font-size: .9rem;
        color: #212121!important;
        font-weight: 600;
        cursor: context-menu;
        padding: .2rem!important;
    }

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
    .item-icon {
      vertical-align: top;
      display: inline-block;
      text-align: center;
      width: 3.5rem;
      margin: 0 10px;
    }
    .link-secondary {
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
        cursor: pointer;
        font-size: .8rem;
        color: #212121!important;
        font-weight: 600;
        padding: .2rem!important;
    }
    .link-disabled {
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
        font-size: .8rem;
        color: #212121!important;
        font-weight: 600;
        cursor: context-menu;
        padding: .2rem!important;
    }
    
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
    .item-icon {
      vertical-align: top;
      display: inline-block;
      text-align: center;
      width: 2.5rem;
      margin: 0 10px;
    }
    
    .mobile-nav-toggle{
        margin-top: 15px;
    }

    .link-secondary {
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
        cursor: pointer;
        font-size: .8rem;
        color: #212121!important;
        font-weight: 600;
        padding: .2rem!important;
    }
    .link-disabled {
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Droid Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
        font-size: .8rem;
        color: #212121!important;
        font-weight: 600;
        cursor: context-menu;
        padding: .2rem!important;
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
@media only screen and (max-width: 320px) {
    .item-icon {
      vertical-align: top;
      display: inline-block;
      text-align: center;
      width: 30px;
      margin: 0 10px;
    }
}

.uk-button-primary {
    background-color: #392458;
    border-radius: 4px;
}
.uk-button-primary:hover {
    background-color: #3f276a;
    color: #ffffff;
}

a.text-primary {
    color: #392458 !important;
    text-decoration: underline !important;
}
a.text-primary:hover{
    color: #3f276a !important;
}
.uk-input, .uk-select, .uk-textarea {
    border-radius: 4px !important;
    border-color: #362156 !important;
    background-color: #ffffff !important;
}
.uk-modal-full {
    background-color: #ffffff !important;
}
.uk-section-muted {
    background-color: #ffffff !important;
}
.uk-width-xlarge {
    width: 700px !important;
}
.uk-dropdown {
    border-radius: 4px;
}

.mobile-nav-icon {
    width: 100%;
    height: auto;
    margin: 0 auto;
    padding: 0 10px 0;
    position: relative;
 } 



</style>

<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky" class="nav-main" id="header">
<nav class="fixed-top uk-navbar-container nav-height uk-container" uk-navbar>
    
    <div class="uk-navbar-left sm-m-view">
        <div class="uk-grid" uk-grid>
            <div class="col-lg-4 col-sm-12 icon-div">
                <a href="{{ route('myhome') }}">
                    <!-- <span> -->
                        <img src="{{ asset('image/logo/logo.png') }}"  style=" padding-right: 15px;">
                    <!-- </span> -->
                </a>
            </div>
            <div class="col-lg-8 hidden-sm p-1">
                <form class="">
                    <input class="form-control search-focus-custom"  type="search" placeholder="Search" name="desktop-search" aria-label="Search" style="border-radius: 23px;">
                    <div uk-dropdown="animation: uk-animation-slide-top-small; duration: 500;mode: click" class="uk-width-xlarge">
                        <div id="load-data">
                            <div class="d-flex">

                @foreach($slmenu as $data)
                @if($data->status == 'active')
                <a class="p-2 link-secondary-search " href="{{ route('open_services',$data->description) }}">{{$data->name}}</a>
                @else
                <a class="p-2 link-secondary-search link-disabled fade-disabled" href="#" onclick="return false;">{{$data->name}}</a>
                @endif
                @endforeach

                            </div>
                            <div id="hotels-loader" class="uk-width-1-1 mt-2">
                            </div>
                            <div id="tours-loader" class="uk-width-1-1 mt-2">
                            </div>
                        </div>
                        <div class="uk-width-1-1 text-center">
                         <div uk-spinner id="loading-data" class="d-none"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  

    <div class="uk-navbar-right nav-menu ">

        <ul class="">
            <li class="active"><a href="index.html"><i class="fas fa-mobile-alt"></i> <b>Download App</b></a></li>
            <li class="active"><a href="{{ route('other-plan') }}"><i class="far fa-building"></i> <b>Merchant</b></a></li>
          
            @if (Route::has('login'))

            @auth
                <li class="active"><a href="{{ route('accnt_profile') }}" ><i class="fas fa-user-circle icon-profile"></i><span class="d-sm-block d-md-none d-lg-none d-xl-none d-xl-block"> Account</span> </a>
                <!-- <ul>
                    <li><a href="{{ route('accnt_profile') }}">Profile</a></li>
                    <li><a href="#">Booking </a></li>
                    <li><a href="#">Like Page</a></li>
                    <li><a href="{{ route('account-setting') }}"><span uk-icon="settings"></span> Settings</a></li>
                    <li><a href="#">LogOut</a></li>
                </ul> -->
                </li>
                <li><a href="{{ route('merchant_logout') }}"><i class="fas fa-sign-out-alt"></i> Signout</a></li>
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

<div class="col-12 bg-white mt-1 hidden-sm">
    <hr class="border-1 m-0" />
</div>

<div class="col-12 bg-white d-xl-block d-lg-block d-none">
    <div class="uk-container">
        <nav class="nav d-flex " >
            @foreach($slmenu as $data)
                @if($data->status == 'active')
                <a class="p-3 link-secondary " href="{{ route('open_services',$data->description) }}" ><i class="{{$data->icon_id}}"></i> {{$data->name}}</a>
                @else
                <a class="p-3 link-disabled fade-disabled" href="#" onclick="return false;"><i class="{{$data->icon_id}}"></i> {{$data->name}}</a>
                @endif
            @endforeach
    
                <a class="p-3 link-disabled fade-disabled" href="" onclick="return false;">|</a>
    
              @foreach($slmenu_exlusive as $data)
                @if($data->status == 'active')
                <a class="p-3 link-secondary " href="{{ route('open_services',$data->description) }}" ><i class="{{$data->icon_id}}"></i> {{$data->name}}</a>
                @else
                <a class="p-3 link-disabled fade-disabled" href="" onclick="return false;"><i class="{{$data->icon_id}}"></i> {{$data->name}}</a>
                @endif
            @endforeach
            
        </nav>
    </div>
</div>




<div class="col-lg-12 pd-2 hidden-xl block-sm uk-navbar-container search-mt-1">
    <form class="">
        <input class="form-control search-focus-custom" name="mobile-search"  type="search" placeholder="Search" aria-label="Search" style="border-radius: 23px;">
        <div uk-dropdown="animation: uk-animation-slide-top-small; duration: 500;mode: click" class="uk-width-xlarge">
            <div id="load-data">
                <div class="d-flex">
                 @foreach($slmenu as $data)
                @if($data->status == 'active')
                <a class="p-2 link-secondary-search " href="{{ route('open_services',$data->description) }}" >{{$data->name}}</a>
                @else
                <a class="p-2 link-secondary-search link-disabled fade-disabled" href="#" onclick="return false;">{{$data->name}}</a>
                @endif
                @endforeach
                </div>
                <div id="hotels-loader2" class="uk-width-1-1 mt-2">
                </div>
                <div id="tours-loader2" class="uk-width-1-1 mt-2">
                </div>
            </div>
            <div class="uk-width-1-1 text-center">
                <div uk-spinner id="loading-data2" class="d-none"></div>
            </div>
        </div>
    </form>
</div>
</div>

<!-- /.nav -->

<div class="row" style="padding: 10px 3px 0;">
    <div class="col-12 d-block d-md-none d-lg-none mt-5">
        <div class="uk-card card-padding nav-mobile-boxshadow">
            <div class="mobile-nav-icon">

                <ul>
                @foreach($slmenu as $data)
                @if($data->status == 'active')

                <li class="li-icons" style="width: 24%; margin-top: 5px;">
                    <a class="link-secondary" href="{{ route('open_services',$data->description) }}">
                        <div>
                            <img src="{{ asset('image/destination/new/'.$data->img) }}" style="width:35px;">
                        </div>
                            <div style="display: inline-flex;">
                                <p style="width: min-content; margin: auto auto 0; line-height: 13px; font-weight: 400; margin-top: 8px; color: black;">{{$data->name}}</p>
                            </div>
                    </a>
                </li>

                @else
                
                <li class="li-icons" style="width: 24%; margin-top: 5px;">
                    <a class="link-secondary" href="{{ route('open_services',$data->description) }}">
                        <div>
                            <img src="{{ asset('image/destination/new/'.$data->img) }}" style="width:35px;">
                        </div>
                            <div style="display: inline-flex;">
                                <p style="width: min-content; margin: auto auto 0;line-height: 14px; font-weight: 400; margin-top: 8px; color: black;">{{$data->name}}</p>
                            </div>
                    </a>
                </li>
                
                @endif
                @endforeach
                </ul>

            </div>

        </div>
    </div>
</div>



<!-- registration -->
<div id="register" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>
        <div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
            <div class="uk-width-1-1">
                <div class="uk-container">
                    <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                        <div class="uk-width-1-1@m">
                            <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-body">
                                <div class="uk-text-center"><img src="{{ asset('image/logo/logoab.png') }}"></div><br>

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
    <button type="submit" class="uk-button uk-button-primary uk-button-meduim uk-width-1-1"><i class="fas fa-user-friends"></i> Register</button>
</div>
<div class="uk-text-small row">
    <div class="col-12">
        <a href="#login" uk-toggle class="text-primary">Login</a>
    </div>
    <div class="col-12">
        <a href="/password/reset" class="text-primary">Forgot Password?</a>
    </div>

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
                            <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-body">
                                <div class="uk-text-center"><img src="{{ asset('image/logo/logoab.png') }}"></div><br>
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
                                        <button type="submit"  class="uk-button uk-button-primary uk-button-meduim uk-width-1-1"><i class="fas fa-unlock-alt"></i> Login</button>
                                    </div>
                                    <div class="uk-text-small row">
                                        <div class="col-12">
                                            <a href="#register " uk-toggle class="text-primary">Register</a>
                                        </div>
                                        <div class="col-12">
                                            <a href="/password/reset" class="text-primary">Forgot Password?</a>
                                        </div>
                                    
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
<div id="registers" class="uk-modal-full" uk-modal>
<div class="uk-modal-dialog">
<button class="uk-modal-close-full uk-close-large uk-position-top" type="button" uk-close></button>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center">Booking Tourismoss</h3>
                        
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





