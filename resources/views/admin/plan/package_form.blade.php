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

            </div>
          </div>
          
          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h4>44</h4>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h4>65</h4>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
        </div>
        

<div class="row">
  <div class="col-12">


    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title"><i class="nav-icon fa fa-get-pocket" aria-hidden="true"></i>  Tourismo Package » <a href="" class="py-0">create</a></h3>
      </div>

      <!-- <form role="form" id="form_valid"> -->
        <form role="form" method="post" action="{{ route('planpackage-save') }}" id="form_valid">
        @csrf
      <div class="card-body">
        
        <div class="form-group">
          <label class="col-form-label">
          Package Name 
          <small class="text-danger has-error">{{ $errors->has('package_name') ?  $errors->first('package_name') : '' }}</small>
        </label>
          <input type="text" name="package_name" class="form-control" placeholder="Package Name">
        </div>
        

      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      </form>
        

    </div>
  </div>
</div>

</div>
</section>

@endsection
