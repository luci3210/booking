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
          <i class="fas fa-box-open"></i> Service » {{ $service_name->name }} » 
            <a href="{{ route('service_listing_create_post',$service_name->description) }}" class="py-0">Create Post</a>
        </h3>
      </div>

    <div class="card-body">
        
        <div class="form-group">
          <label>Tour Package</label>
          <input type="text" class="form-control" placeholder="Enter email">
        </div>

<div class="row">

  <div class="form-group col-3">
    <label>
      <span class="text-danger">*</span> First Name
      <small class="text-danger has-error">
        
      </small>
    </label>
  <input type="text" name="fname" value="" class="form-control" placeholder="First Name">
  </div>


<div class="form-group col-3">
  <label>
    Last Name
    <small class="text-danger has-error">
      
    </small>
  </label>
<input type="text" name="lname" value="" class="form-control" placeholder="Last Name">
</div>


<div class="form-group col-3">
  <label>
    <span class="text-danger">*</span> E-mail Address
    <small class="text-danger has-error">
      
    </small>
  </label>
<input type="text" name="email" value="" class="form-control" placeholder="E-mail Address">
</div>


<div class="form-group col-3">
  <label>
    Contact No.
    <small class="text-danger has-error">
      
    </small>
  </label>
<input type="text" name="contact" value="" class="form-control" placeholder="Contact No.">
</div>

</div>



<div class="form-group">
  <label>Tour Package Description</label>
  <textarea class="form-control" rows="3" placeholder="Tour Package Description ..."></textarea>
</div>


<div class="form-group">
  <label>What to expect</label>
  <textarea class="form-control" rows="3" placeholder="What to expect ...."></textarea>
</div>

<div class="form-group">
  <label>Cancelation and Refund Policy</label>
  <textarea class="form-control" rows="3" placeholder="What to expect ...."></textarea>
</div>


    </div>
        
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-left">
        </ul>
      </div>

    </div>
  </div>
</div>

</div>


</section>

@endsection
