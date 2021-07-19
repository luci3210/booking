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
          <i class="fas fa-id-card"></i> Balance Overview
        </h3>
      </div>

    <div class="card-body">



<div class="row invoice col-12 p-3 mb-3">
  <div class="col-sm-4 invoice-col">  
    <form role="form" method="post" action="{{ route('merchant_bank_create') }}">

@csrf

<p class="lead">Merchant Balance</p>
<p class="lead">₱ 10,082.00</p>


<div class="form-group">

    <button type="submit" class="btn btn-danger float-left" style="margin-right: 5px;">
      Withdraw
    </button>
</div>
</form>
  </div>

  <div class="col-sm-8 invoice-col p-3 mb-1">  
  <p class="lead"><i class="fas fa-university"></i> {{ $account_list[0]->bank }} 

    @if($account_list[0]->status == 1)
    <small class="text-success"><i class="fas fa-check"></i> Verified</small>
    @else
        <small class="text-danger"><i class="fas fa-times"></i> UnVerified</small>
    @endif

  </p>

  <p>
    {{ $account_list[0]->account_name }}<br>
  
    Account Number : * * * * {{ substr($account_list[0]->account_number, -4) }}
  </p>

  </div>
</div>









</div>


    </div>
  </div>
</div>

</div>
</section>

@endsection
