@extends('layouts.app')

@section('third_party_stylesheets')
@endsection

@section('content')
<section class="content">
<div class="container-fluid">

<div class="row">
  <div class="col-12">
    <div class="card">
      
<div class="card-header">
<h3 class="card-title">New Booking</h3>

</div>

<div class="card-body">


<table class="table table-bordered table-sm" id="datatable">

<thead>                  
<tr>
  <th style="width: 25px">#</th>
  <th class="text-center">Reference No.</th>
  <th class="text-center">Confirm No.</th>
  <th class="text-center">Service Name</th>
  <th class="text-center">Service</th>
  <th class="text-center">Price</th>
  <th class="text-center">Amount Paid</th>
  <th class="text-center">Book Date</th>
  <th class="text-center">Confirm Date</th>
  <th class="text-center">Execute Date</th>
  <th class="text-center">Action</th>
</tr>
</thead>

<tbody>
  <tr style="font-size:14px">
    <td colspan="11" class="text-center">
          <p class="text-center mt-3"> No data found</p> 
    </td>
  </tr>
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
@endsection
