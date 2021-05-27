

@extends('layouts.tourismo.ui')
@section('merchant')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('content')
<style>
.member-info > h4 {
    font-weight: 700;
    padding-left: 5px;
    font-size: 18px;
    padding-top: 10px;
    color: #333!important;
}
.wishlist-box{
  padding: 0 0 0 0!important;
}
.action-btn {
  padding: 5px;
}

.custom-container{
  padding: 10px;
}
@media only screen and (max-width: 650px) {
  .m-b-1{
    margin-bottom: .5em;
  }
    
}
</style>

<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">

      <div class="uk-background-tph">
          <div class="uk-background-primary uk-light uk-padding uk-panel">
              <p class="uk-h4">Account ID : AB000001</p>
          </div>
      </div>
      <!-- /. header ID holder -->


      <div class="col-lg-3">
          @include('layouts.tourismo.acnt_menu', ['profilePic' => $data['data']['account'][0]->profpic ])
      </div>
      <!-- /. col 3 info side -->

      <div class="col-lg-9">
        <section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
          <div class="">
          @if(!$hotelList || count($hotelList) <= 0)
          <div class="row">
              <div class="section-title"style="margin-bottom: 5vh!important;">
                <h2><b>Hotels</b> <span style="font-size: 15px;padding-left: 25px;"><a href="#" class="uk-link"><i class="fas fa-chevron-right"></i> count 0 </a></span></h2>
              </div>
              <!-- /. section title -->
          </div>
          @endif
            @if($hotelList && count($hotelList) >= 1)
            <div class="row">
              <div class="section-title"style="margin-bottom: 5vh!important;">
                <h2><b>Hotels</b> <span style="font-size: 15px;padding-left: 25px;"><a href="#" class="uk-link"><i class="fas fa-chevron-right"></i> count {{ count($hotelList) }} </a></span></h2>
              </div>
              <!-- /. section title -->
              <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider >
                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">
                  @foreach($hotelList as $list)
                  <li>
                    <div class="icon-box icon-box-pink wishlist-box" style="padding: 0!important;">
                    <div class="uk-panel">
                        <img src="{{ asset('image/destination')}}/DESTI2021052360aa7ecde3f1b.jpg" alt=""  style="border-radius: 4px;">
                        <div class="uk-position-center uk-panel"> </div>
                    </div>
                    <!-- /. div img -->
                    <div class="member-info">
                    <h4>{{ $list->roomname }}</h4>
                    <!-- /. room name -->
                    <div><span style="font-weight: 500px; font-size: 14px;color:#ff2f00; width:100%"><b>₱ {{ $list->price }}</b> / For {{ $list->nonight }} Night</span></div>
                    <!-- /.price and night -->
                    <span>
                      <img style="padding-bottom: 5px; " src="{{ asset('upload/merchant/icons/baseline_local_dining_black_18dp.png')}}">
                      {{ $list->booking_package }}
                    </span>
                    <div><span><img style="padding-bottom: 3px;" src="{{ asset('upload/merchant/icons/baseline_supervisor_account_black_18dp.png')}}">Max Guests: {{ $list->noguest }}</span></div>
                    <!-- max guest -->
                    <span>
                      <img style="padding-bottom: 1px;" src="{{ asset('upload/merchant/icons/baseline_visibility_black_18dp.png')}}"> City View
                    </span>
                    <div class="details-m action-btn">
                      <a class="uk-button uk-button-default uk-button-small m-b-1" href="{{ route('tourismo_room', $list->id) }}">Explore</a>
                      <a class="uk-button uk-button-small btn-room-details-m" href="javascript:void(0)" uk-toggle="target: #rooms"><i class="fas fa-share"></i> Share</a>
                    </div>
                    <!-- /. button action -->
                    </div>
                    <!-- /. info -->

                    </div>
                    <!-- /.card box -->
                  </li>
                  <!-- /. li -->
                  @endforeach
                </ul>
                <!-- /.ul slider -->
              </div>
              </div>
              <!-- /.row -->
              <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
              <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
              @endif
              @if(!$tourList || count($tourList) <= 0)
              <div class="row">
                  <div class="section-title"style="margin-bottom: 5vh!important;">
                    <h2><b>Tour Package</b> <span style="font-size: 15px;padding-left: 25px;"><a href="#" class="uk-link"><i class="fas fa-chevron-right"></i> count 0 </a></span></h2>
                  </div>
                  <!-- /. section title -->
              </div>
              @endif
            </div>
            <!-- /.container -->
          </div>
          <!-- /. col -->
        </section>
        <!-- /. section hotel -->
        
    <!-- /. section col - 9 info -->
    </div>
    <!-- /. row -->
  </div>
  <!-- /. container -->
</section>
<!-- /.row -->

@section('js')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-contact.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-address.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="{{ asset('ijaboCropTool-master/ijaboCropTool.min.js') }}"></script> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
       $('#file').ijaboCropTool({
          preview : '.image-previewer',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("user_profile_upload") }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             Swal.fire(
              'Upload Success',
              message,
              'success'
            )
            setTimeout(()=>{ window.location.reload()},1500)
          },
          onError:function(message, element, status){
            alert(message);
            console
          }
       });
  </script>
  
@endsection
@endsection
