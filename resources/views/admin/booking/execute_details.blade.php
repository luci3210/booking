@extends('layouts.app')

@section('third_party_stylesheets')
@endsection

@section('content')

<!-- ------------------------------ modal ------------------------ -->    

 <div class="modal fade" id="modal_execute_confirm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="charge_name">Please confirm</h4><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     

<div class="modal-body">

<!-- --------------------- details ------------------ -->

<div class="row">
                
<div class="col-12">
<br>
<br>
  <div class="table-responsive">
    <table class="table">
      <tbody>

<tr>

<th style="width:30%">Total Paid Amount</th>
  <td class="text-center">
    ₱{{ $data[0]->pm_book_amount }}
  </td>
  <td>
  </td>
</tr>

<tr class="text-muted">
  <th>Tourismo % Charge</th>
  <td class="text-center">
    % {{ $data[0]->chrg_value }}
  </td>
  <td>
  </td>
</tr>

<tr>
  <th>Tourismo</th>
  <td class="text-center">
    &nbsp;&nbsp;&nbsp; {{ $charge =  ($data[0]->pm_book_amount / 100) * $data[0]->chrg_value}}
  </td>
  <td>
     <b>+</b> Income
  </td>
</tr>


<tr>
  <th>{{ $data[0]->company }}</th>
  <td class="text-center">
    &nbsp;&nbsp;&nbsp; {{ $data[0]->pm_book_amount - $charge }}
  </td>
  <td>
    <b>+</b> Income
  </td>
</tr>

    </tbody></table>
  </div>
</div>
</div>


<!-- ------------------------end details--------------->

</div>
<form name="confirm" action="{{ route('adm_execute_confirm',$data[0]->pm_id) }}" method="post">
  @csrf
<div class="modal-footer justify-content-between">

  <input type="hidden" name="amount_paid" value="{{ $data[0]->pm_book_amount }}" readonly="readonly">
  <input type="hidden" name="tourismo_charge" value="{{ $data[0]->chrg_value }}" readonly="readonly">
  <input type="hidden" name="tourismo_income" value="{{ $charge = ($data[0]->pm_book_amount / 100) * $data[0]->chrg_value}}" readonly="readonly">
  <input type="hidden" name="merchant_income" value="{{ $data[0]->pm_book_amount - $charge }}" readonly="readonly">
  <input type="hidden" name="payment_id" value="{{ $data[0]->pm_id }}" readonly="readonly">
  <input type="hidden" name="payment_status_id" value="{{ $data[0]->ps_id }}" readonly="readonly">
  
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
  <button type="submit" class="btn btn-success float-right">
    <i class="fa fa-check" aria-hidden="true"></i> Confirm
  </button>

</div>
</form>
    </div>
  </div>
</div>


<!-- ---------------------------- end modal --------------------- -->


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
            
<!-- ---------------------- TOURISMO LOGO ---------------------- -->

<div class="invoice p-3 mb-3">
<div class="row">
  <div class="col-12">
    <h4>
      <img src="{{ asset('image/logo/logo.png') }}" />
    </h4>
  </div>
</div>

<br>

<!-- ---------------------- COLUMN 1 ---------------------- -->

<div class="row invoice-info">
  <div class="col-sm-4 invoice-col">
    <address>
      <strong>{{ $data[0]->company }}</strong><br>
      {{ $data[0]->address}}<br>
      Philippines<br>
      <b>Contact No. :</b> {{ $data[0]->telno }}<br>
      <b>Email:</b> {{ $data[0]->email }}
    </address>
  </div>


<!-- ---------------------- COLUMN 2 ---------------------- -->

  <div class="col-sm-4 invoice-col">
    <address>
      <strong>{{ $data[0]->lname }} {{ $data[0]->fname }} {{ $data[0]->mname }}.</strong><br>
      {{ $data[0]->address }}<br>
      Philippines<br>
      <b>Phone:</b> {{ $data[0]->pnumber }}<br>
      <b>Email:</b>{{ $data[0]->email }}
    </address>
  </div>

<!-- ---------------------- COLUMN 3 ---------------------- -->

  <div class="col-sm-4 invoice-col">
    <b>Reference No.</b> {{ $data[0]->ps_ref_no }}<br>
    <b>Confirmation No.</b> {{ str_pad($data[0]->chg_id,11,'0', STR_PAD_LEFT) }}<br>
    <b>Booking ID:</b> {{ str_pad($data[0]->pm_id,11,'0', STR_PAD_LEFT) }}<br>
    <b>Confirm Date:</b> {{ $data[0]->chg_created_at }} <br>
    <b>Booked Date:</b> {{ $data[0]->pm_created_at }} <br>
    <b>Booked Reserved:</b> {{ $data[0]->pm_book_date }} - {{ $data[0]->pm_book_date_to }} <br>
  </div>
</div>


<!-- --------------------- SERVICE NAME ------------------ -->
<div class="row">
  <div class="col-12 table-responsive">
    <table class="table table-striped">
      <tbody>
      <tr>
        <th style="width:200px;">Service Name</th>
        <td colspan="7">{{ $data[0]->tour_name}}</td>
      </tr>
      </tbody>
    </table>
  </div>
</div>


<br>

<!-- ------------------- CALCULATION ----------------------- -->
<div class="row">
                
<div class="col-12">

  <div class="table-responsive">
    <table class="table">
      <tbody>

<tr>

<th style="width:30%">Total Paid Amount</th>
  <td class="text-center">
    ₱{{ $data[0]->pm_book_amount }}
  </td>
  <td>
  </td>
</tr>

<tr class="text-muted">
  <th>Tourismo Charge</th>
  <td class="text-center">
    % {{ $data[0]->chrg_value }}
  </td>
  <td>
  </td>
</tr>

<tr>
  <th>Tourismo</th>
  <td class="text-center">
    <b>+</b>&nbsp;&nbsp;&nbsp; {{ $charge =  ($data[0]->pm_book_amount / 100) * $data[0]->chrg_value}}
  </td>
  <td>
    New Income
  </td>
</tr>


<tr>
  <th>Merchant</th>
  <td class="text-center">
    <b>+</b>&nbsp;&nbsp;&nbsp; {{ $data[0]->pm_book_amount - $charge }}
  </td>
  <td>
    New Income
  </td>
</tr>

    </tbody></table>
  </div>
</div>
</div>

<!-- ---------------------------BUTTON-------------------------- -->
<div class="row no-print">
  <div class="col-12">

    <button type="button" class="btn btn-success float-right" id="target_btn" data-toggle="modal" style="margin-right: 5px;">
      <i class="fa fa-check" aria-hidden="true"></i> Execute
    </button>


  </div>
</div>
</div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
</section>

@endsection

@section('third_party_scripts')

<script>

$(document).ready(function () {

$('body').on('click', '#target_btn', function (event) {

    event.preventDefault();
    $('#modal_execute_confirm').modal('show');
  
  });
});

</script>
@endsection
