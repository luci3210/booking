@extends('layouts.app')

@section('third_party_stylesheets')
  <style type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"></style>
@endsection

@section('content')

 <div class="modal fade" id="charge_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="charge_name">New Booking</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="companydata" method="post" action="">
     

      <div class="modal-body">

<table class="table table-bordered">

  <tbody>
  
    <tr>
      <td><b>Reference No.</b></td>
      <td id="refrence_no" colspan="3"></td>
    </tr>

    <tr>
      <td><b>Service Name</b></td>
      <td colspan="3"><a href="#" id="service_name"></a></td>
    </tr>
   
    <tr>
      <td><b>Service</b></td>
      <td id="service" colspan="3"></td>
    </tr>
   
    <tr>
      <td><b>Amount Paid & Charge</b></td>
      <td>{{ $data[0]->pm_book_amount }}</td>
      <td>{{ $data[0]->pm_book_amount }}</td>
      <td>% <span id="charge"></span></td>
    </tr>
   
    <tr>
      <td><b>Book Date</b></td>
      <td id="date_at" colspan="3"></td>
    </tr>
   
    <tr>
      <td><b>Reserved Date</td>
      <td>From : {{ $data[0]->pm_book_date }}</td>
      <td colspan="2">To : {{ $data[0]->pm_book_date_to}}</td>
    </tr>
   
    <tr>
      <td><b>Charge Date Begin</b></td>
      <td colspan="3" class="text-danger">
      	<b>{{ Carbon\Carbon::parse($data[0]->pm_book_date_to)->addDays(3) }}</b>
      </td>
    </tr>
   
  </tbody>
</table>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Execute Date Charge</button>
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
<h3 class="card-title">New Booking</h3>


<form method="GET" action="{{ route('show_search_booking') }}">
<div class="row justify-content-end">

<div class="col-3 text-right">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
</div>
<input type="text" name="dfrom" class="form-control form-control-sm" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" placeholder="dd/mm/yyyy" inputmode="numeric">
</div>
</div>

<div class="col-3 text-right">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
</div>
<input type="text" name="dto" class="form-control form-control-sm" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" placeholder="dd/mm/yyyy" inputmode="numeric">
</div>
</div>

<div class="col-2 text-right">
<button type="submit" class="btn btn-primary btn-block btn-sm">Load Data</button>
</div>
</div>

</form>

</div>

<div class="card-body">


<table class="table table-bordered table-sm" id="datatable">

<thead>                  
<tr>
  <th style="width: 25px">#</th>
  <th class="text-center">Reference No.</th>
  <th class="text-center">Service Name</th>
  <th class="text-center">Service</th>
  <th class="text-center">Amount</th>
  <th class="text-center">Book Date</th>
  <th class="text-center" rowspan="2">Reserved Date</th>
  <th class="text-center">Remark Date</th>
  <th class="text-center">Execute</th>
  <th style="width:100px" class="text-center">Action</th>
</tr>
</thead>

<tbody>
@forelse($data as $list)
<tr style="font-size:14px">
  <td>{{ $loop->index + 1 }}</td>
  <td>{{ $list->pm_id }}</td>
  <td>{{ substr($list->tour_name,0,29) }}</td>
  <td>{{ $list->pname }}</td>
  <td>Php {{ $list->pm_book_amount }}</td>
  <td>{{ substr($list->pm_created_at,0,10) }}</td>
  <td>{{ substr($list->pm_book_date,0,10) }}</td>
  <td>{{ substr($list->pm_book_date_to,0,10) }}</td>
  <td>{{ Carbon\Carbon::parse($list->pm_book_date_to)->addDays(3) }}</td>
  <td>
  </td>

    <td class="text-center">
<a href="#" class="btn btn-sm btn-primary" id="target_btn" data-toggle="modal" data-id="{{ $list->pm_id }}">Update</a>

    </td>
</tr>
@empty
<tr>
	<td rowspan="10">
		<p class="text-center mt-3"> No booking found</p>	
	</td>
</tr> 
@endforelse
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

    $.get('booking/' + id + '/booking', function (data) {

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
