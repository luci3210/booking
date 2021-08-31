@extends('layouts.merchant-app')

@section('content')

 <div class="modal fade" id="charge_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="charge_name">Confirmation basic  details</h4><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     

<div class="modal-body">

<!-- ---------------------1st row------------------ -->
<table class="table table-bordered table-sm">
<tbody>
  <tr style="font-size:14px;">
    <th>Service Name / Description</th>
  </tr>
  <tr style="font-size:14px;">
    <td><a href="">{{ $data[0]->ps_description }}</a><br>
      <small class="text-muted">Free Nights {{ $data[0]->nonight }}</small></td>
  </tr>
</tbody>
</table>

<!-- ---------------------2nd row------------------ -->
<table class="table table-bordered table-sm mt-4">
<tbody>
  <tr style="font-size:14px;">
    <th>Reference</th>
    <th>Confirmation</th>
    <th>Date Confirm</th>
    <th>Booked Date</th>
    <th colspan="2" class="text-center">Booked Reserved</th>
  </tr>
  <tr style="font-size:14px;">
    <td>{{ $data[0]->ps_ref_no }}</td>
    <td>{{ str_pad($data[0]->chg_id,11,'0', STR_PAD_LEFT) }}</td>
    <td>{{ $data[0]->chg_created_at }}</td>
    <td>{{ $data[0]->pm_created_at }}</td>
    <td>{{ $data[0]->pm_book_date }}</td>
    <td>{{ $data[0]->pm_book_date_to }}</td>
  </tr>
</tbody>
</table>


<!-- ---------------------3nd row------------------ -->
<table class="table table-bordered table-sm mt-4">
<tbody>
  <tr style="font-size:14px;">
    <th>Book Name</th>
    <th>Amount</th>
    <th>Amount Paind</th>
    <th>Tourismo Charge</th>
  </tr>
  <tr style="font-size:14px;">
    <td>{{ $data[0]->fname }} {{ $data[0]->mname }}. {{ $data[0]->lname }} </td>
    <td>{{ $data[0]->price }}</td>
    <td>{{ $data[0]->pm_book_amount }}</td>
    <td>7% </td>
  </tr>
</tbody>
</table>

<p>
Poster Income and Tourismo charge will be reflict after date : <b>{{ $data[0]->chg_created_at }}</b>
</p>

      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>


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
          Confirm Booking
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
          <a href="#" class="text-primary" id="target_btn" data-toggle="modal" data-id="{{ $post->pm_id }}">  
            Details
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

    $.get('confirm_booking/' + id + '/details', function (data) {

        $('#charge_id').val(data.data.pm_id);
        $('#refrence_no').text(data.data.ps_ref_no);
        $('#service_name').text(data.data.ps_description);
        $('#service').text(data.data.name);
        $('#amount_paid').text(data.data.pm_book_amount);
        $('#date_from').text(data.data.pm_book_date);
        $('#date_to').text(data.data.pm_book_date_to);
        $('#date_at').text(data.data.pm_created_at);
        $('#charge').text(data.data.chrg_value);
        $('#confirmation_date').text(data.data.chg_date);
        $('#charge_modal').modal('show');
     
       })
  });
});

</script>
@endsection

