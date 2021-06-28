@extends('layouts.merchant-app')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
        
            <div class="small-box bg-info">
              <div class="inner">
                <h4>150</h4>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h4>53<sup style="font-size: 20px">%</sup></h4>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>44</h4>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>65</h4>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        




<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-box-open"></i> Service » @if($service_name) {{ $service_name->name }}  @endif » 
          @if($service_name)<a href="{{ route('service_listing_create_post',$service_name->description) }}" class="py-0">Create Post</a> @endif
        </h3>
      </div>

    <div class="card-body">
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
