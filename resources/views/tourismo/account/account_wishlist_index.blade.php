@extends('layouts.tourismo.ui')
@section('merchant')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/profile.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('content')

<section class="contact aos-init aos-animate min-80" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">
    <div class="row">


      <div class="col-lg-3">
          @include('layouts.tourismo.acnt_menu', ['profilePic' => $data['data']['account'][0]->profpic ])
      </div>
      <!-- /. col 3 info side -->

      <div class="col-lg-9 col-sm-12">
        <div class="info-box p-3">
            <h3>WISHLIST</h3>
              <div class="uk-overflow-auto">
                <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Hotel Address</th>
                            <th>Booking Details</th>
                            <th>Package</th>
                            <th>Room Facilities</th>
                            <th>Building Facilities</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($wishListData && count($wishListData) >= 1)
                    @foreach($wishListData as $list)
                      <tr>
                          <td class="text-nowrap">
                          @if($list->service_id == "10016")
                            <a href="{{ route('tourismo_room', $list->wh_page_id) }}" >
                          @else
                          <a href="{{ route('tourimos_tour_package', $list->wh_page_id) }}" >
                          @endif
                            <div class="">{{ $list->tour_name }}</div></a>
                          </td>
                          <td ><div class="elips"><b>₱ {{ $list->price }}</b> / For {{ $list->nonight }} Night</span></div></td>
                          <td class=""><div class="elips">{{ $list->address }}</div></td>
                          <td class="" ><p class="elips"> <span><img style="padding-bottom: 3px;" src="{{ asset('upload/merchant/icons/baseline_supervisor_account_black_18dp.png')}}">Max Guests: {{ $list->noguest }}</span></p></td>
                          <td class="" ><div class="elips">{{ $list->booking_package }}</div></td>
                          <td class=""><div class="elips">{{ $list->room_facilities }}</div></td>
                          <td class=""><div class="elips">{{ $list->building_facilities }}</div></td>
                      </tr>
                      @endforeach
                    @endif
                    @if(!$wishListData || count($wishListData) <= 0)
                      <tr>
                          <td colspan="8">no data</td>
                      </tr>
                    @endif
                    </tbody>
                </table>
              </div>
        </div>
        <!-- cardinfo bbox -->
        <ul class="pagination pagination-sm m-0 float-left">
            {{$wishListData->links() }}
        </ul>
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
