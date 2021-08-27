@extends('layouts.merchant-app')

@section('content')

<section class="content">
<div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          New Booking
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
      <th>Confirm</th>
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
        
        <i class="fa fa-check text-success" aria-hidden="true"></i>

      </td>
      <td class="text-center">
          <a href="{{ route('booking_getdetails',[$post->description,$post->pm_id])}}">
            View Details
          </a>
        
      </td>
    </tr>
    @endforeach 
</thead>

<tbody>
</tbody>

</table>
</div>
        
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-left">
          {{--$bookData->links()--}}
        </ul>
      </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
