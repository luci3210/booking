@extends('layouts.app')

@section('content')

<!-- ------------------------- request ----------------------------------- -->

<div class="modal fade" id="charge_modal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="charge_name">Validate Account</h4><br>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-body">
<ul class="list-unstyled">
<li><b>Reference No. :</b> <span id="iwid"></span></li>
<li><b>Merchant Name :</b> <span id="merchant"></span></li>
<li><b>Request By. :</b> <span id="fname"></span> <span id="mname"></span> <span id="lname"></span></li>
<li><b>Amount Bal. :</b> Php <span id="amount_bal"></span></li>
<li><b>Amount w/draw :</b> <span id="amount_req"></span></li>
<li><b>Request Date :</b> <span id="req_date"></span></li>

<li><b>Bank Account Details</b>
  <ul>
    <li><span id="bank_name"></span></li>
    <li><span id="bank_account_name"></span></li>
    <li><span id="bank_account_no"></span></li>
  </ul>
</li>
</ul>


    </div>

    <div class="modal-footer justify-content-between">

    <form method="post" action="{{ route('adm_withdrawal_validate_request') }}">
      @csrf
      <input type="hidden" name="iw" id="viwid">
      <button type="submit" class="btn btn-primary">Print and Validate</button>
    </form>
    </div>


  </div>
</div>
</div>

<!-- ----------------------------- process ----------------------------- -->

<div class="modal fade" id="process_modal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="charge_name">Validated Account</h4><br>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

<div class="modal-body">
<div class="row">
<div class="col-md-6">
<ul class="list-unstyled">
  <li><b>Reference No. :</b> <span id="piwid"></span></li>
  <li><b>Merchant Name :</b> <span id="pmerchant"></span></li>
  <li><b>Request By. :</b> <span id="pfname"></span> <span id="pmname"></span> <span id="plname"></span></li>
  <li><b>Amount Bal. :</b> Php <span id="pamount_bal"></span></li>
  <li><b>Amount w/draw :</b> <span id="pamount_req"></span></li>
  <li><b>Request Date :</b> <span id="preq_date"></span></li>
  
  <li><b>Bank Account Details</b>
    <ul>
      <li><span id="pbank_name"></span></li>
      <li><span id="pbank_account_name"></span></li>
      <li><span id="pbank_account_no"></span></li>
    </ul>
  </li>
</ul>
</div>

<div class="col-md-6">
<form role="form" action="{{ route('adm_withdrawal_validated_post_request') }}" method="post">
  @csrf
  <div class="card-body">
    <div class="form-group">
      <label>Reference No./Receipt No.</label>
      <input type="text" name="receiptno" class="form-control form-control-sm" placeholder="Reference No./Receipt No.">
      <input type="hidden" name="iw" id="pviwid">
    </div>

    <button type="submit" class="btn btn-primary btn-sm pull-right">Update</button>

  </div>
</form>
</div>

</div>

</div>

    </div>
  </div>
</div>


<!-- ----------------------------------- end of modal ------------------- -->

<section class="content">
<div class="container-fluid">

<div class="row">
  <div class="col-12">

<div class="card card-primary card-outline">
<div class="card-header">
  <h3 class="card-title">Withdrawals Process</h3>
</div>
<div class="card-body">
  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="false">Request</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Process</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="true">Success</a>
    </li>
  </ul>

  <div class="tab-content" id="custom-content-below-tabContent">

  <!-- ------------------------- request ----------------------- -->

    <div class="tab-pane fade active show" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
       
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr style="font-size:14px;">
            <th>Reference#</th>
            <th>Merchant</th>
            <th>Name</th>
            <th colspan="3" class="text-center">Amount</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($withdrawal_request) > 0)
          @foreach($withdrawal_request as $list)
          <tr style="font-size:14px;">
            <td>WDR{{ str_pad($list->iw_id,9,'0', STR_PAD_LEFT) }}</td>
            <td>{{ $list->company }}</td>
            <td>{{ $list->fname }}</td>
            <td>Php {{ $list->iw_withdraw_balane }}</td>
            <td><i class="fas fa-angle-double-right"></i></td>
            <td>Php {{ $list->iw_withdraw_amount }} </td>
            <td>{{ $list->iw_created_at }}</td>
            <td>
              <a href="#" class="btn btn-primary btn-sm" id="target_btn" data-toggle="modal" data-id="{{ $list->iw_id }}">  
            Details
          </a>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="7" class="text-center">
              <p class="mt-4"><i class="fas fa-search"></i> No data found.</p>
            </td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>

    </div>
    
  <!-- ------------------------- process ----------------------- -->
  
<div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
  <tr style="font-size:14px;">
    <th>Reference#</th>
    <th>Merchant</th>
    <th>Name</th>
    <th colspan="3" class="text-center">Amount</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
  @if(count($withdrawal_process) > 0)
  @foreach($withdrawal_process as $list)
  <tr  style="font-size:14px;">
    <td>WDR{{ str_pad($list->iw_id,9,'0', STR_PAD_LEFT) }}</td>
    <td>{{ $list->company }}</td>
    <td>{{ $list->fname }}</td>
    <td>Php {{ $list->iw_withdraw_balane }}</td>
    <td><i class="fas fa-angle-double-right"></i></td>
    <td>Php {{ $list->iw_withdraw_amount }} </td>
    <td>{{ $list->iw_created_at }}</td>
    <td>
      <a href="#" class="btn btn-primary btn-sm" id="process_btn" data-toggle="modal" data-id="{{ $list->iw_id }}">  
        Update
      </a>
    </td>
  </tr>
  @endforeach
  @else
  <tr>
    <td colspan="7" class="text-center">
      <p class="mt-4"><i class="fas fa-search"></i> No data found.</p>
    </td>
  </tr>
  @endif
</tbody>
</table>
</div>
</div>

  <!-- ------------------------- success ----------------------- -->
    
<div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr style="font-size:14px;">
<th>Reference#</th>
<th>Receipt#</th>
<th>Merchant</th>
<th>Name Request</th>
<th>Amount Deposeted</th>
<th>Date Request</th>
<th>Name Process</th>
<th>Date Process</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@if(count($withdrawal_success) > 0)
@foreach($withdrawal_success as $list)
<tr  style="font-size:14px;">
<td>WDR{{ str_pad($list->iw_id,9,'0', STR_PAD_LEFT) }}</td>
<td>{{ $list->iw_reference_no }}</td>
<td>{{ $list->company }}</td>
<td>{{ $list->fname }}</td>
<td>Php {{ $list->iw_withdraw_amount }} </td>
<td>{{ $list->iw_created_at }}</td>
<td>{{ $list->name }}</td>
<td>{{ $list->iw_updated_at }}</td>
<td>
<a href="#" class="btn btn-danger btn-sm" id="process_btn" data-toggle="modal" data-id="{{ $list->iw_id }}">  
  Update
</a>
</td>
</tr>
@endforeach
@else
<tr>
<td colspan="7" class="text-center">
<p class="mt-4"><i class="fas fa-search"></i> No data found.</p>
</td>
</tr>
@endif
</tbody>
</table>
</div>
</div>
  
  </div>
            


          </div>
          <!-- /.card -->
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

    $.get('' + id + '/request/get', function (data) {

        $('#iwid').text(data.data.iw_id);
        $('#viwid').val(data.data.iw_id);
        $('#merchant').text(data.data.company);
        $('#fname').text(data.data.fname);
        $('#lname').text(data.data.lname);
        $('#mname').text(data.data.mname);
        $('#amount_bal').text(data.data.iw_withdraw_balane);
        $('#amount_req').text(data.data.iw_withdraw_amount);
        $('#req_date').text(data.data.iw_created_at);
        $('#bank_name').text(data.data.bank);
        $('#bank_account_name').text(data.data.account_name);
        $('#bank_account_no').text(data.data.account_number);
        $('#charge_modal').modal('show');
     
       })
  });



$('body').on('click', '#process_btn', function (event) {

    event.preventDefault();
    var id = $(this).data('id');

    $.get('' + id + '/request/get', function (data) {

        $('#piwid').text(data.data.iw_id);
        $('#pviwid').val(data.data.iw_id);
        $('#pmerchant').text(data.data.company);
        $('#pfname').text(data.data.fname);
        $('#plname').text(data.data.lname);
        $('#pmname').text(data.data.mname);
        $('#pamount_bal').text(data.data.iw_withdraw_balane);
        $('#pamount_req').text(data.data.iw_withdraw_amount);
        $('#preq_date').text(data.data.iw_created_at);
        $('#pbank_name').text(data.data.bank);
        $('#pbank_account_name').text(data.data.account_name);
        $('#pbank_account_no').text(data.data.account_number);
        $('#process_modal').modal('show');
     
       })
  });




});

</script>
@endsection