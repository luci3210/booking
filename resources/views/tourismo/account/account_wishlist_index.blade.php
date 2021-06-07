

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
.elips{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  width: 85%;
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


      <div class="col-lg-3">
          @include('layouts.tourismo.acnt_menu', ['profilePic' => $data['data']['account'][0]->profpic ])
      </div>
      <!-- /. col 3 info side -->

      <div class="col-lg-9 col-sm-12">
        <div class="info-box p-3">
            <ul class="uk-tab-bottom" uk-switcher uk-tab>
              <li class="uk-active"><a href="#hotels">Hotels</a></li>
              <li><a href="#Tour">Tour Package</a></li>
          </ul>
          <div  class="uk-switcher">
            <li id="hotels" class="">
              <div class="uk-overflow-auto">
                <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                        <tr>
                            <th>Hotel Name</th>
                            <th>Price</th>
                            <th>Hotel Address</th>
                            <th>Booking Details</th>
                            <th>Package</th>
                            <th>Room Facilities</th>
                            <th>Building Facilities</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($hotelList && count($hotelList) >= 1)
                    @foreach($hotelList as $list)
                      <tr>
                          <td class=""><a href="{{ route('tourismo_room', $list->wh_page_id) }}" ><div class="elips">{{ $list->roomname }}</div></a></td>
                          <td ><div class="elips"><b>₱ {{ $list->price }}</b> / For {{ $list->nonight }} Night</span></div></td>
                          <td class=""><div class="elips">{{ $list->address }}</div></td>
                          <td class="" ><p class="elips"> <span><img style="padding-bottom: 3px;" src="{{ asset('upload/merchant/icons/baseline_supervisor_account_black_18dp.png')}}">Max Guests: {{ $list->noguest }}</span></p></td>
                          <td class="" ><div class="elips">{{ $list->booking_package }}</div></td>
                          <td class=""><div class="elips">{{ $list->room_facilities }}</div></td>
                          <td class=""><div class="elips">{{ $list->building_facilities }}</div></td>
                      </tr>
                      @endforeach
                    @endif
                    @if(!$hotelList || count($hotelList) <= 0)
                      <tr>
                          <td colspan="8">no data</td>
                      </tr>
                    @endif
                    </tbody>
                </table>
              </div>
            </li>
            <li id="Tour">
            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                        <tr>
                            <th>Hotel Name</th>
                            <th>Price</th>
                            <th>Hotel Address</th>
                            <th>Booking Details</th>
                            <th></th>
                            <th>Package</th>
                            <th>Room Facilities</th>
                            <th>Building Facilities</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($tourList && count($tourList) >= 1)
                    @foreach($tourList as $list)
                      <tr>
                          <td class="elips"><a href="{{ route('tourismo_room', $list->wh_page_id) }}">{{ $list->roomname }}</a></td>
                          <td><b>₱ {{ $list->price }}</b> / For {{ $list->nonight }} Night</span></td>
                          <td class="elips">{{ $list->address }}</td>
                          <td colspan="2"><p><span><img style="padding-bottom: 3px;" src="{{ asset('upload/merchant/icons/baseline_supervisor_account_black_18dp.png')}}">Max Guests: {{ $list->noguest }}</span></p></td>
                          <td>{{ $list->booking_package }}</td>
                          <td>{{ $list->room_facilities }}</td>
                          <td>{{ $list->building_facilities }}</td>
                      </tr>
                      @endforeach
                    @endif
                    @if(!$tourList || count($tourList) <= 0)
                      <tr>
                          <td colspan="8">no data</td>
                      </tr>
                    @endif
                    </tbody>
                </table>
              </div>
            </li>
          </div>
        </div>
        <!-- cardinfo bbox -->
      </div>
      <!-- /.col -->
    </div>
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
