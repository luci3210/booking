@extends('layouts.app')

@section('third_party_stylesheets')
@endsection

@section('content')


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

 <div class="col-6">
<p class="lead">Merchant</p>

<div class="table-responsive">
  <table class="table">
    <tbody><tr>
      <th style="width:30%">Quantity</th>
      <td>
        Price (₱{{ $data[0]->pm_book_amount }}) <b>x</b> Quantity ({{$data[0]->pm_book_qty}})
      </td>
      <td>
        = <b>₱</b> {{ $quantity = $data[0]->pm_book_qty * $data[0]->pm_book_amount }}.00
      </td>
    </tr>
    <tr>
      <th>No. of Day's</th>
      <td>
        Price (₱{{ $data[0]->pm_book_amount }}) <b>x</b> Day 2<br>
        <small class="text-muted">Free Nights {{ $data[0]->nonight }}</small>
      </td>
      <td>
        = <b>₱</b> {{ $numberofdays = $data[0]->pm_book_amount * (2-1) }}.00
      </td>
    </tr>

    <tr style="font-size:20px;font-weight: 600">
      <th>Total</th>
      <td>
      </td>
      <td>
        &nbsp;&nbsp;&nbsp;<b>₱</b> {{ $quantity + $numberofdays }}.00
      </td>
    </tr>

    <tr>
      <th>Discount</th>
      <td>
        Coupon ID : XXX-X
      </td>
      <td>
        &nbsp;&nbsp;&nbsp;Amount : 0.00
      </td>
    </tr>


  </tbody></table>
</div>
</div>

                
<div class="col-6">
  <p class="lead">Tourismo + eXecute Charges</p>

  <div class="table-responsive">
    <table class="table">
      <tbody>

<tr>

<th style="width:30%">Total Paid Amount</th>

<td>
  Price (₱{{ $data[0]->pm_book_amount }}) <b>x</b> Quantity ({{$data[0]->pm_book_qty}})
</td>

</tr>


      <tr>
        <th>No. of Day's</th>
        <td>
          Price (₱{{ $data[0]->pm_book_amount }}) <b>x</b> Day 2<br>
          <small class="text-muted">Free Nights {{ $data[0]->nonight }}</small>
        </td>
        <td>
          = <b>₱</b> {{ $numberofdays = $data[0]->pm_book_amount * (2-1) }}.00
        </td>
      </tr>

      <tr style="font-size:20px;font-weight: 600">
        <th>Total</th>
        <td>
        </td>
        <td>
          &nbsp;&nbsp;&nbsp;<b>₱</b> {{ $quantity + $numberofdays }}.00
        </td>
      </tr>

      <tr class="text-muted">
        <th>Tourismo Charge</th>
        <td>
          {{ $data[0]->chrg_value }} % <b>x</b> Total (₱ {{ $quantity + $numberofdays }}.00)
        </td>
        <td>
          &nbsp;&nbsp;&nbsp;<b>= ₱</b> {{ $charge = ($quantity + $numberofdays) * ($data[0]->chrg_value / 100) }}

        </td>
      </tr>

      <tr style="font-size:20px;font-weight: 600" class="text-danger">
        <th>Income</th>
        <td>
        </td>
        <td>
          &nbsp;&nbsp;&nbsp;<b>₱</b> {{ $income = ($quantity + $numberofdays) - $charge  }}
        </td>
      </tr>

    </tbody></table>
  </div>
</div>
</div>

<!-- ---------------------------BUTTON-------------------------- -->
<div class="row no-print">
  <div class="col-12">
    <button type="button" class="btn btn-success float-right">
      <i class="far fa-credit-card"></i> View History
    </button>
    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
      <i class="fas fa-download"></i> Execute
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
@endsection
