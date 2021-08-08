@extends('layouts.tourismo.ui_mobile')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">

<style>
    #card-point{
        display: none;
    }
    .mobile-nav-icon{
        display: none;
    }
    .spacer-1{
        display: none;
    }
    #main {
        margin-top: 15px!important;
    }
    .btn-color {
        background-color: #392458!important;
        border-radius: 5px!important;
    }
    table{
        white-space: nowrap;
    }
</style>
@section('content')

<div class="container">
    <div class="row g-1">
        <div class="col-12">
          @include('tourismo.account.mobile.user_acct_menu_mobile')
        </div>
        <div class="col-12">
                <div class="info-box p-3">
                    <h3>BOOKING</h3>

                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-small uk-table-divider">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Payment Reference No.</th>
                                    <th>Payment Thru</th>
                                    <th>Payment Status</th>
                                    <th>Price</th>
                                    <th>Address</th>
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
                                <td class="text-nowrap">
                                @if($list->service_id == "10016")
                                    <a href="{{ route('tourismo_room', $list->pm_page_id) }}" >
                                @else
                                <a href="{{ route('tourimos_tour_package', $list->pm_page_id) }}" >
                                @endif
                                    <div class="">{{ $list->tour_name }}</div></a>
                                </td>
                                <td ><div class="elips"><p>{{$list->ps_ref_no}}</p></div></td>
                                <td ><div class="elips"><p>{{$list->ps_payment_method}}</p></div></td>
                                <td ><div class="elips"><p>{{$list->ps_payment_status}}</p></div></td>
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
                </div>
                <ul class="pagination pagination-sm m-0 float-left">
                    {{$hotelList->links() }}
                </ul>
            </div>
        </div>
      <!-- /.col -->

    </div>
</div>

@endsection

@section('js')
@endsection
