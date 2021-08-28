@extends('layouts.merchant-app')

@section('content')

 <div class="modal fade" id="charge_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="charge_name">New Booking</h4><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     

<div class="modal-body">

<table class="table table-bordered">

  <tbody>
    
    <tr>
      <td><b>Reference No.</b></td>
      <td id="refrence_no" colspan="2"></td>
    </tr>

    <tr>
      <td><b>Service Description</b></td>
      <td colspan="2"><a href="#" id="service_name"></a></td>
    </tr>
   
    <tr>
      <td><b>Booked By</b></td>
      <td id="service" colspan="2"></td>
    </tr>
   
    <tr>
      <td><b>Price & Amount Paid</b></td>
      <td>Php {{ $data[0]->price }}</td>
      <td>Php {{ $data[0]->pm_book_amount }}</td>
    </tr>
   
    <tr>
      <td><b>Book Date</b></td>
      <td id="date_at" colspan="2"></td>
    </tr>
   
    <tr>
      <td><b>Reserved Date</td>
      <td>From : {{ $data[0]->pm_book_date }}</td>
      <td colspan="2">To : {{ $data[0]->pm_book_date_to}}</td>
    </tr>
   
    <tr>
      <td><b>Income reflict after</b></td>
      <td colspan="2">
        <b>{{ Carbon\Carbon::parse($data[0]->pm_book_date_to)->addDays(3) }}</b>
      </td>
    </tr>
   
  </tbody>
</table>

      </div>

      <form id="companydata" method="post" action="{{ route('poster_confirmed') }}">
        @csrf
        <input type="hidden" name="ps" value="{{ $data[0]->ps_id }}">
        <input type="hidden" name="chg_date" value="{{ Carbon\Carbon::parse($data[0]->pm_book_date_to)->addDays(3) }}">
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Confirm Booking</button>
      </div>

      </form>

    </div>
  </div>
</div>




<section class="content">
<div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          New Booking
        </h3>
      </div>

<div class="card-body">
<table class="table table-bordered table-sm">
<thead>                  
    <tr  style="font-size:14px">
      <th style="width: 5px">No.</th>
      <th style="width: 10px">reference#</th>        
      <th>Name</th>
      <th>Price</th>
      <th>Paid Amount</th>
      <th>Payment With</th>
      <th>Booked Date</th>
      <th colspan="2">Booked Reserved</th>
      <th>Confirm No.</th>
      <th class="text-center">Action</th>
    </tr>
    @foreach($data as $post)
    <tr style="font-size:14px">
      <td class="text-center">{{ $loop->index + 1 }}</td>
      <td>{{ $post->ps_ref_no }}</td>
      <td><a href="">{{ $post->ps_description }}</a></td>
      <td>Php {{ $post->price }}</td>
      <td>Php {{ $post->pm_book_amount }}</td>
      <td>{{ $post->ps_payment_code }}</td>
      <td>{{ substr($post->pm_created_at,0,10) }}</td>
      <td>{{ substr($post->pm_book_date,0,10) }}</td>
      <td>{{ substr($post->pm_book_date_to,0,10) }}</td>
      <td class="text-center">
        
        {{ str_pad($post->chg_id,11,'0', STR_PAD_LEFT) }}

      </td>
      <td class="text-center">
          <a href="#" class="btn btn-sm btn-danger" id="target_btn" data-toggle="modal" data-id="{{ $post->pm_id }}">  
            <i class="fa fa-pencil" aria-hidden="true"></i> Update
          </a>
      </td>
    </tr>
    @endforeach 
</thead>

<tbody>
</tbody>

</table>
</div>

    </div>
  </div>
</div>

</div>
</section>

@endsection

@section('third_party_scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>

$(document).ready(function () {

$('body').on('click', '#target_btn', function (event) {

    event.preventDefault();
    var id = $(this).data('id');

    $.get('new_booking/' + id + '/to_confirm', function (data) {

        $('#charge_id').val(data.data.pm_id);
        $('#refrence_no').text(data.data.ps_ref_no);
        $('#service_name').text(data.data.tour_name);
        $('#service').text(data.data.name);
        $('#amount_paid').text(data.data.pm_book_amount);
        $('#date_from').text(data.data.pm_book_date);
        $('#date_to').text(data.data.pm_book_date_to);
        $('#date_at').text(data.data.pm_created_at);
        $('#charge').text(data.data.chrg_value);
        $('#charge_modal').modal('show');
     
       })
  });
});

</script>
@endsection

