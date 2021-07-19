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
          <i class="fas fa-box-open"></i> Bank Account
        </h3>
      </div>

    <div class="card-body">





<div class="row">
<div class="invoice  col-6 p-3 mb-3">
<div class="col-12">
<!-- <p class="lead"><span class="text-danger">*</span> Add Bank Account</p> -->
  
<form role="form" method="post" action="{{ route('merchant_bank_create') }}">

@csrf

<div class="form-group">
  <label><span class="text-danger">*</span>  Account Name   
    @error('account_name')
      <small class="text-danger has-error">{{ $message }}</small>
  @enderror

  </label>
  <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{ old('account_name') }}" placeholder="Account Name">


</div>


<div class="form-group">
<label><span class="text-danger">*</span> Bank Name
  @error('bank_name')
      <small class="text-danger has-error">{{ $message }}</small>
    @enderror
</label>

<select class="custom-select @error('bank_name') is-invalid @enderror" name="bank_name">
  <option value="" disabled="true" selected="-Select country-">-Select Bank-</option>
  @foreach($bank_list as $list)
    <option value="{{ $list->bid }} ">{{ $list->bank }}</option>  
  @endforeach
</select>

</div>

<div class="form-group">
  <label><span class="text-danger">*</span>  Account Number   
    @error('account_num')
      <small class="text-danger has-error">{{ $message }}</small>
    @enderror
  </label>
  <input type="text" name="account_num" value="{{ old('account_num') }}" class="form-control @error('account_num') is-invalid @enderror" placeholder="Account Number">
</div>


<div class="form-group">

    <button type="submit" class="btn btn-primary float-left" style="margin-right: 5px;">
      <i class="fas fa-plus-square"></i> Create
    </button>
</div>
</form>

</div>

</div>



<div class="col-6">
  <div class="col-12">
<hr>

    @foreach($account_list as $list)
  <p class="lead"><i class="fas fa-university"></i> {{ $list->bank }} 

    @if($list->status == 1)
    <small class="text-success"><i class="fas fa-check"></i> Verified</small>
    @else
        <small class="text-danger"><i class="fas fa-times"></i> UnVerified</small>
    @endif

  </p>

  <p>
    {{ $list->account_name }}<br>
  
    Account Number : * * * * {{ substr($list->account_number, -4) }}
  </p>
<hr>
  @endforeach

</div>
</div>














</div>





</div>


    </div>
  </div>
</div>

</div>
</section>

@endsection
