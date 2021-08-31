@extends('layouts.merchant-app')

@section('content')

<section class="content">
<div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          Today registered guest
        </h3>
      </div>

<div class="card-body">
<table class="table table-bordered table-sm">
<thead>                  
    <tr  style="font-size:14px">
      <th>No.</th>
      <th>reference#</th>        
      <th>confimation#</th>   
      <th>Service Name / Description</th>     
      <th>Full Name</th>
      <th>Contact No.</th>
      <th>Booked Date</th>
      <th colspan="2">Booked Reserved</th>
      <th class="text-center">Action</th>
    </tr>
    
    <tr style="font-size:14px">
      <td class="text-center" colspan="10">
            <p class="text-center mt-3"><i class="fa fa-search" aria-hidden="true"></i> No registerd guest found.</p>
      </td>
    </tr>
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
@endsection

