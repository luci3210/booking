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
  <th class="text-center">Service Name</th>
  <th class="text-center">Service</th>
  <th class="text-center">Price</th>
  <th class="text-center">Amount Paid</th>
  <th class="text-center">Book Date</th>
  <th class="text-center" colspan="2">Reserved Date</th>
</tr>
</thead>

<tbody>
@forelse($data as $list)
<tr style="font-size:14px">
  <td>{{ $loop->index + 1 }}</td>
  <td>{{ $list->ps_ref_no }}</td>
  <td>{{ substr($list->ps_description,0,29) }}</td>
  <td>{{ $list->name }}</td>
  <td>Php {{ $list->price }}</td>
  <td>Php {{ $list->pm_book_amount }}</td>
  <td>{{ substr($list->pm_created_at,0,10) }}</td>
  <td>{{ substr($list->pm_book_date,0,10) }}</td>
  <td>{{ substr($list->pm_book_date_to,0,10) }}</td>
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
@endsection
