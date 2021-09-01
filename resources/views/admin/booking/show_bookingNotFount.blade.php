@extends('layouts.app')

@section('third_party_stylesheets')
  <style type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"></style>
@endsection

@section('content')

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

<tr>
	<td colspan="10">
		<p class="text-center mt-3"> No booking found</p>	
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
