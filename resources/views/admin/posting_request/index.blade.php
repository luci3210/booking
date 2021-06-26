@extends('layouts.app')

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
        <h3 class="card-title"><i class="fas fa-clipboard"></i> Posting Request</h3>
      </div>

    <div class="card-body">
        <table class="table table-bordered">
        
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Merchant</th>
              <th>Type</th>
              <th>Description</th>
              <th>Price</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posting as $list)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $list->company }}</td>
              <td>{{ $list->name }}</td>
              <td>{{ $list->tour_name }}</td>
              <td>₱{{ $list->price }}</td>
              <td>
                @if($list->ts == 2)
                  <span class="text-danger">Pending</span> 
                @elseif($list->ts == 3)
                  <span class="text-warning">For-Compliance</span> 
                @else
                  ?
                @endif
              </td>
              <td class="text-center">
                  
                  <div class="btn-group btn-group-sm">
                        <a href="{{ route('view_posting',[$list->serviceid,$url]) }}" class="btn btn-info"><i class="fas fa-eye"></i> Edit & Update</a>
                  </div>
              
              </td>
              
            @endforeach
        </tbody>

        </table>
    </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
