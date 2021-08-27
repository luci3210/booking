@extends('layouts.merchant-app')

@section('content')

<section class="content">
      <div class="container-fluid">





<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          <i class="nav-icon fas fa-book-reader"></i> Booking list
        </h3>
      </div>

<div class="card-body">


    <form method="GET" action="{{ route('bookingserach') }}">
  <div class="row">
    <div class="col-3">
     <select class="form-control" name="status">
        <option value="">-Option-</option>
        <option value="success">Success</option>
        <option value="pending">Pending</option>
        <option value="cancelled">Cancelled</option>
      </select>
    </div>
    <div class="col-3">
      <input type="text" name="dfrom" class="form-control" placeholder="Date From">
    </div>
    <div class="col-3">
      <input type="text" name="dto" class="form-control" placeholder="Date To">
    </div>
    <div class="col-3">
      <button type="submit" class="btn btn-block btn-info">Search</button>
    </div>
  </div>

  </form>
<br>
        <table class="table table-bordered">
        <thead>                  
            <tr>
              <th style="width: 10px">reference#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Status</th>
              <th>Payment Method</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
            @if($bookData)
            @foreach($bookData as $post)
            <tr>
              <td style="width: 10px">#{{ $post->ps_ref_no }}</td>
              <td>
                
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="https://www.hotelnewsnow.com/Media/Default/Images2016/Locations/Westin-Wilmington-Front.jpg" alt="user image">
              </div>
              </td>
              <td>{{ $post->tour_name }}</td>
              <td>{{ $post->price }}</td>
              <td>{{ $post->ps_payment_status }}</td>
              <td>{{ $post->noguest }}</td>
              <td>{{ $post->ps_payment_method  }}</td>
              <td class="text-center">
                <div class="btn-group btn-group-sm">
                  <a href="" class="btn btn-info"><i class="fas fa-eye"></i> Edit</a>
                  <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                </div>
              </td>
            </tr>
            @endforeach
            @endif
        </thead>
        
        <tbody>
        </tbody>
        
        </table>
    </div>
        
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-left">
          {{$bookData->links()}}
        </ul>
      </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
