<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>TourismoPH</title>
  <meta content="" name="Tourismo">
  <!--  meta tags SEO -->
  <!-- google -->
      <meta name="title" content="{{ $keywords ?? 'tourismo ph' }}">
      <meta name="description" content="{{$description ?? 'TOURSIMO PH'}}">
      <meta name="keywords" content="{{$keywords ?? 'tourismo ph' }}">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="language" content="English">
      <meta name="author" content="Tourismo admin">
      <meta itemprop="image" content="{{  $img ?? asset('/upload/merchant/profilepic/default.png') }}">
      
  <!-- /.google -->
  <!-- fb tags -->
      <meta property="og:url" content="@yield('curUrl')" />
      <meta property="og:type" content="website" />
      <meta property="og:title" content="{{ $keywords ?? 'tourismo ph'}}" />
      <meta property="og:description" content="{{$description ?? 'TOURSIMO PH'}}" />
      <meta property="og:image" content="{{  $img ?? asset('/upload/merchant/profilepic/default.png') }}" />
  <!-- /. fb tags -->
  <!-- Twitter Meta Tags -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="{{ $keywords ?? 'tourismo ph' }}">
      <meta name="twitter:description" content="{{$description ?? 'TOURSIMO PH'}}">
      <meta name="twitter:image" content="{{  $img ?? asset('/upload/merchant/profilepic/default.png') }}">
  <!-- /. Twitter Meta Tags -->


  <!-- /. meta tags SEO -->
  <meta content="" name="Tourismo">
  <link href="{{ asset('image/logo/favicon.png') }}" rel="icon">
  <link href="{{ asset('image/logo/favicon.png') }}" rel="apple-touch-icon">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/css/uikit.css'>
  <style>
    .theme-btn{
      background-color: #502672 !important;
      border-radius: 3px  !important;
      border: solid 1px #502672 !important
    }
    .elips-3{
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
    }
    .elips-2{
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }
    .elips-1{
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
    }
    .title-package{
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      font-weight:600;
      font-size:.9rem
    }
    #main{
      min-height: 100vh;
    }
    @-webkit-keyframes placeHolderShimmer {
            0% {
              background-position: -468px 0;
            }
            100% {
              background-position: 468px 0;
            }
          }
          
          @keyframes placeHolderShimmer {
            0% {
              background-position: -468px 0;
            }
            100% {
              background-position: 468px 0;
            }
          }
          
          .content-placeholder {
            display: inline-block;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-name: placeHolderShimmer;
            animation-name: placeHolderShimmer;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee));
            background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            -webkit-background-size: 800px 104px;
            background-size: 800px 104px;
            height: inherit;
            position: relative;
            height: 250px;
            width: 100%;
          }
	

  </style>
  @yield('merchant')
</head>
<body>

@include('sweetalert::alert')
@include('layouts.tourismo.ui-header_mobile')

@yield('banner')
@yield('modal_login')

<main id="main"><!-- 
<div class="marg-header"></div> -->
@yield('content')



</main>

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500"> -->

<!--     <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>. . . . . .</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->

  <!--   <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About TourismoPH</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div> -->

    <!-- <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>TourismoPH</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer> -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('public/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('public/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('public/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('public/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('public/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('public/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('public/vendor/aos/aos.js') }}"></script>

  <script src="{{ asset('public/js/main.js') }}"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/js/uikit.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/js/uikit-icons.js'></script>
  <script src="https://kit.fontawesome.com/f0c1ec087f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script>
  async function openApp(routeDestination,openLink) {
    var TempText = document.createElement("input");
    TempText.value = routeDestination;
    document.body.appendChild(TempText);
    TempText.select();
    
    document.execCommand("copy");
    document.body.removeChild(TempText);

    var sticky = UIkit.sticky('.sticky', {
        offset: 50,
        top: 100
    });

    var notifications =  await UIkit.notification('Link Copied', 'success');
    if(notifications){
      setTimeout(()=>{
        if(openLink == 'viber'){
          window.open('viber://pa?chatURI')
        }
        if(openLink == 'wazap'){
          window.open('https://api.whatsapp.com/send?phone=0000000')
        }
      },1500)
    }

  }
  async function sendMessenger(routeDestination) {
    var TempText = document.createElement("input");
    TempText.value = routeDestination;
    document.body.appendChild(TempText);
    TempText.select();
    
    document.execCommand("copy");
    document.body.removeChild(TempText);

    var sticky = UIkit.sticky('.sticky', {
        offset: 50,
        top: 100
    });

    var notifications =  await UIkit.notification('Link Copied', 'success');
    if(notifications){
      setTimeout(()=>{
        window.open('https://www.messenger.com/t')
      },1500)
    }

  }

  async function copyLink(routeDestination) {
    var TempText = document.createElement("input");
    TempText.value = routeDestination;
    document.body.appendChild(TempText);
    TempText.select();
    
    document.execCommand("copy");
    document.body.removeChild(TempText);

    var sticky = UIkit.sticky('.sticky', {
        offset: 50,
        top: 100
    });

    var notifications =  await UIkit.notification('Link Copied', 'success');
  }

  async function copyEmbed(routeDestination, title) {
    var TempText = document.createElement("input");
    TempText.value = `<iframe width="5 60" height="315" src="${routeDestination}" title="${title}" ' frameborder="0"></iframe>`;
    document.body.appendChild(TempText);
    TempText.select();
    document.execCommand("copy");
    document.body.removeChild(TempText);
    var sticky = UIkit.sticky('.sticky', {
        offset: 50,
        top: 100
    });

    var notifications =  await UIkit.notification('Embed Copied', 'success');
  }

  var creds = '{{$loginAuth ?? null }}'
    if(creds){
      $('#log-email').val(creds);
      $('#pass-email').val(creds);
      setTimeout(()=> {
        $('#btn-log').click()
      },500)
  } // login gsp token

  $('#login-form').submit(function(e) {
    e.preventDefault();
  }).validate({
    rules: {
      email:{
        required:true,
        email: true
      },
      password: {
        required: true,
      },
    },
    messages: {
      email: {
        required: "Please enter a email ",
        email:'invalid email',
      },
      password: {
        required: "Please provide a password",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.err').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('text-danger');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('text-danger');
    },
    submitHandler: function(e) {
        
        $.ajax({
            url: '{{route('check_auth')}}',
            type: 'post',
            data: $('#login-form').serialize(),
            success: function(res) {
              console.log(res);
              if(res != true){
                swal({
                    title: "ERROR",
                    text: `${res}`,
                    icon: "error",
                });
                return;
              }
              $.ajax({
                url: '{{route('login')}}',
                type: 'post',
                data: $('#login-form').serialize()
              }).then((e)=>{
                window.location.reload();
              })
            },
            error:function(e)  {
              swal({
                  title: "ERROR",
                  text: "something went wrong!",
                  icon: "error",
              });
            }          
        })
    }
  });


  $('#reg-form').validate({
    rules: {
      name: {
        required: true,
      },
      email:{
        required:true,
        email: true
      },
      password: {
        required: true,
        minlength: 6,
      },
      password_confirmation :{
          required: true,
          minlength : 6,
          equalTo : "#reg-pass",
      },
      terms:{
        required:true,
      }
    },
    messages: {
      name: {
        required: "Please enter a full name ",
      },
      email: {
        required: "Please enter a email ",
        email:'invalid email',
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long",
        passwordCheck:"password atleast one uppercase",

      },
      password_confirmation: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long",
        equalTo:"Password not match",
      },
      terms:{
        required:"Check if you agree in our terms & conditions"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.err').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('text-danger');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('text-danger');
    }
  });


</script>

<script>
    $(document).ready(function(){
    // typing variable
    var typingTimer;                //timer identifier
    var doneTypingInterval = 1000;  //time in ms, 5 second for example
    var key_search = $("input[name='desktop-search']");

    var typingTimer2;                //timer identifier
    var doneTypingInterval2 = 1000;  //time in ms, 5 second for example
    var key_search2 = $("input[name='mobile-search']");
    //  desktop input search model start =========  


    //on keyup, start the countdown
    key_search.on('keyup', function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });
    //on keydown, clear the countdown 
    key_search.on('keydown', function () {
      clearTimeout(typingTimer);
      showLoading()

    });

     //user is "finished typing,"
    async function doneTyping () {
      let val = key_search.val();
      key_search2.val(val);// mobile input 
      await ajaxSearch(val)
      hideLoading()
    }

    //on keyup, start the countdown
    key_search2.on('keyup', function () {
      clearTimeout(typingTimer2);
      typingTimer2 = setTimeout(doneTyping2, doneTypingInterval2);
    });
    //on keydown, clear the countdown 
    key_search2.on('keydown', function () {
      clearTimeout(typingTimer2);
      showLoading()
    });
    async function doneTyping2 () {
      let val = key_search2.val();
      key_search.val(val);// desktop input mot model
      await ajaxSearch(val)
      hideLoading()
    }

    function toggleLoading(){
      $('#loading-data').toggleClass('d-none')
      $('#loading-data2').toggleClass('d-none')
    }
    function hideLoading(){
      $('#loading-data').addClass('d-none')
      $('#loading-data2').addClass('d-none')
    }
    function showLoading(){
      $('#loading-data').removeClass('d-none')
      $('#loading-data2').removeClass('d-none')
      clearData()
    }

    function clearData(){
      $('#hotels-loader').html('');
      $('#tours-loader').html('');
      $('#hotels-loader2').html('');
      $('#tours-loader2').html('');
    }

    function ajaxSearch(search) {
      $.ajaxSetup({
        url: '{{ route('search') }}',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            '_token': '{{ Session::token()  }}',
            'Authorization': '{{ Session::token()  }}',
        },
        method:"POST",
        data:{
          search: search,
        },  
        success:function(data)
        {

          if(data['success']){
            console.log(data['data']['hotel']);
            if(data['data']['hotel'].length >= 1){
              data['data']['hotel'].forEach(loadHotel);
            }
            if(data['data']['tour'].length >= 1){
              data['data']['tour'].forEach(loadTour);
            }
            console.log(data['data']['tour']);

          }
        },
        error:function(data){
          console.log('error',data)
        }
    });
    $.ajax();
    }
    // mobile input 

    function loadHotel(item,index){
      document.getElementById("hotels-loader").innerHTML += `<div class="row pointer" onClick="window.location='/hotels/rooms/${item['upload_id']}'" >
     <div class="search-img col-auto mt-1" style="background-image: url('{{ asset('upload/merchant/coverphoto') }}/${item['photo']}')"></div>
      <div class="col-9"><h5 class="mb-0 title-search">${item['roomname']}</h5><p class="m-0 desc-search">${item['roomdesc']}</p></div></div>`; 
      //dekstop
      document.getElementById("hotels-loader2").innerHTML += `<div class="row pointer" onClick="window.location='/hotels/rooms/${item['upload_id']}'" >
     <div class="search-img col-auto mt-1" style="background-image: url('{{ asset('upload/merchant/coverphoto') }}/${item['photo']}')"></div>
      <div class="col-9"><h5 class="mb-0 title-search">${item['roomname']}</h5><p class="m-0 desc-search">${item['roomdesc']}</p></div></div>`; 
      //mobile
    }
    function loadTour(item,index){
      document.getElementById("hotels-loader").innerHTML += `<div class="row pointer" onClick="alert('tour')" >
     <div class="search-img col-auto mt-1" style="background-image: url('{{ asset('upload/merchant/tour') }}/${item['photo']}')"></div>
      <div class="col-9"><h5 class="mb-0 title-search">${item['tour_name']}</h5><p class="m-0 desc-search">${item['tour_desc']}</p></div></div>`;
      // desktop 

      document.getElementById("hotels-loader2").innerHTML += `<div class="row pointer" onClick="alert('tour')" >
     <div class="search-img col-auto mt-1" style="background-image: url('{{ asset('upload/merchant/tour') }}/${item['photo']}')"></div>
      <div class="col-9"><h5 class="mb-0 title-search">${item['tour_name']}</h5><p class="m-0 desc-search">${item['tour_desc']}</p></div></div>`; 
      // mobile


    }
    })
</script>

<script>

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(getNearBy, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  const coords = position.coords
  console.log(coords)
  $('#lat').val(position.coords.latitude)
  $('#lng').val(position.coords.longitude)
  // x.innerHTML = "Latitude: " + position.coords.latitude + 
  // "<br>Longitude: " + position.coords.longitude;
}

function getNearBy(position){
  console.log(position)

  const lat = position.coords.latitude
  const lng = position.coords.longitude
  
  $.ajaxSetup({
        // url: '{{ route("nearByDestinations",["lat"=> "'+position.coords.latitude+'", "lng"=> "'+position.coords.longitude+'",]) }}',
        url: '{{ route("nearByDestinations",["lat"=> "lat", "lng"=> "lng",]) }}',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            '_token': '{{ Session::token()  }}',
            'Authorization': '{{ Session::token()  }}',
        },
        method:"get",
        success:function(data)
        {
          console.log(data)
          let countData = data.length
          var output = '';
          if(countData >= 1){
            $('.loaders').hide('slow')

            for (let i = 0; i < countData; i++) {
              const img = data[i]['photo'] == '' || data[i]['photo'] == null ? 'default.png' : data[i]['photo']
              const assUrl = '{{asset('image/tour/2021')}}/'
              let url = '{{ route("by_name", [":description" ,":country", ":district", ":tour_name"]) }}'
              const paramsData =  [data[i]['description'],data[i]['country'],data[i]['district'],data[i]['tour_name']]
              url = url.replace(':description', data[i]['description']);
              url = url.replace(':country', data[i]['country']);
              url = url.replace(':district', data[i]['district']);
              url = url.replace(':tour_name', data[i]['tour_name']);
              output +=`
              <li>
              <a href="${url}">
                  <div class=" shadow-cards">
                      <div class="uk-card-media-top">
                          <div style="width: 100%; 
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                          height: 15rem;
                          background-image: url('${assUrl}${img}');
                          border-top-left-radius: 10px!important;
                          border-top-right-radius: 10px!important;
                          border-bottom-left-radius: 10px!important;
                          border-bottom-right-radius: 10px!important;
                          ">
                          <div class="position-relative elips">
                              <span class="badge badge-pill badge-light bg-light text-dark badge-floats elips">${data[i]['tour_name']}</span>
                          </div>    
                      </div>
                      </div>
                  </div>
              </a>
              </li>
              `
            }

          }
          $('#load-near').append(output)


      
        },
        error:function(data){
          console.log('error',data)
        }
    });
    $.ajax();
  

}



function randomNear(lat,lng){
  
  $.ajaxSetup({
        // url: '{{ route("nearByDestinations",["lat"=> "'+position.coords.latitude+'", "lng"=> "'+position.coords.longitude+'",]) }}',
        url: '{{ route("nearByDestinations",["lat"=> "lat", "lng"=> "lng",]) }}',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            '_token': '{{ Session::token()  }}',
            'Authorization': '{{ Session::token()  }}',
        },
        method:"get",
        success:function(data)
        {
          console.log(data)
          let countData = data.length
          var output = '';
          if(countData >= 1){
            $('#loaders').hide('slow')
            for (let i = 0; i < countData; i++) {
              const img = data[i]['photo'] == '' || data[i]['photo'] == null ? 'default.png' : data[i]['photo']
              const assUrl = '{{asset('image/tour/2021')}}/'
              let url = '{{ route("by_name", [":description" ,":country", ":district", ":tour_name"]) }}'
              const paramsData =  [data[i]['description'],data[i]['country'],data[i]['district'],data[i]['tour_name']]
              url = url.replace(':description', data[i]['description']);
              url = url.replace(':country', data[i]['country']);
              url = url.replace(':district', data[i]['district']);
              url = url.replace(':tour_name', data[i]['tour_name']);
              output +=`
              <li>
              <a href="${url}">
                  <div class=" shadow-cards">
                      <div class="uk-card-media-top">
                          <div style="width: 100%; 
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                          height: 15rem;
                          background-image: url('${assUrl}${img}');
                          border-top-left-radius: 10px!important;
                          border-top-right-radius: 10px!important;
                          border-bottom-left-radius: 10px!important;
                          border-bottom-right-radius: 10px!important;
                          ">
                          <div class="position-relative elips">
                              <span class="badge badge-pill badge-light bg-light text-dark badge-floats elips">${data[i]['tour_name']}</span>
                          </div>    
                      </div>
                      </div>
                  </div>
              </a>
              </li>
              `
            }
          }
          $('#load-near').html(output)


      
        },
        error:function(data){
          console.log('error',data)
        }
    });
    $.ajax();
  

}

function showError(error) {
  // $('#loaders').hide('slow')
  switch(error.code) {
    case error.PERMISSION_DENIED:
      randomNear(0.0,0.0)
      break;
    case error.POSITION_UNAVAILABLE:
      randomNear(0.0,0.0)
      break;
    case error.TIMEOUT:
      randomNear(0.0,0.0)
      break;
    case error.UNKNOWN_ERROR:
      randomNear(0.0,0.0)
      break;
  }
}

// function showError(error) {
//   $('#loaders').hide('slow')
//   let msg
//   switch(error.code) {
//     case error.PERMISSION_DENIED:
//       msg = `<h3 class="text-dark">User denied the request for Geolocation.</h3>`

//       break;
//     case error.POSITION_UNAVAILABLE:
//       msg = `<h3 class="text-dark">Location information is unavailable.</h3>`

//       $('#load-near').append(msg)

//       break;
//     case error.TIMEOUT:
//       msg = `<h3 class="text-dark">The request to get user location timed out.</h3>`
//       $('#load-near').append(msg)
//       break;
//     case error.UNKNOWN_ERROR:
//       msg = `<h3 class="text-dark">An unknown error occurred.</h3>`
//       break;
//   }
//   $('#load-near').append(msg)

// }
</script>

  @yield('merchantjs')
  @yield('js')
  @include('layouts.tourismo.ui_global_share')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>