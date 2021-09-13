@extends('layouts.app')

@section('content')

<section class="content">
      <div class="container-fluid">


<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">Finance</h3>
      </div>

  <div class="card-body">

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<table class="table table-bordered">
<thead>                  
    <tr>
      <th>This Day</th>
      <th>This Month</th>
      <th>Merchant Total</th>
      <th>Tourismo Total</th>
      <th>Total</th>
    </tr>
</thead>

<tbody>
  
  <tr>
      <td>Php {{ $thisday }}</td>
      <td>Php {{ $thismonth }}</td>
      <td>
        Php {{ $merchant_total_income }}<br> 
        <small class="text-danger">- Php {{ $merchantTotalWithdrawals }}</small>
      </td>
      <td>
        Php  {{ $company_total_income }} <br>
        <small class="text-danger">- Php 0.00</small>

      </td>
      <td>
        Php  {{ $total_paid_amount }}<br>
        <small class="text-danger">- Php {{ $merchantTotalWithdrawals }}</small>
      </td>
  </tr>

</tbody>

</table>

<table class="table table-bordered table-sm mt-4">
<thead>                  
    <tr style="font-size:14px;">
      <th style="width: 10px">#</th>
      <th>Reference No</th>
      <th>Paid Amount</th>
      <th>Tourismo Charge</th>
      <th>Tourismo Income</th>
      <th>Merchant Income</th>
      <th>Date Execute</th>
      <th style="width: 180px" class="text-center">Action</th>
    </tr>
</thead>

<tbody>
  @foreach($data as $list)
  <tr style="font-size:14px;">
      <td>{{ $loop->index + 1 }}</td>
      <td>{{ $list->ps_ref_no }}</td>
      <td>{{ $list->mi_paid_amount }}</td>
      <td><b>%</b> {{ $list->mi_tourismo_charge }}</td>
      <td class="text-success">Php {{ $list->mi_tourismo_income }}</td>
      <td>Php {{ $list->mi_merchant_income }}</td>
      <td>{{ $list->created_at }}</td>
      <td>{{ $list->created_at }}</td>
  </tr>
  @endforeach
             
</tbody>
</table>

  </div>


</div>
    </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
