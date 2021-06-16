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
          <label>
            <span class="text-danger">*</span> Tour Package Name
            <small class="text-danger has-error">
                {{ $errors->has('tour_package_name') ?  $errors->first('tour_package_name') : '' }}
            </small>
          </label>
          <input type="text" name="tour_package_name" value="" class="form-control" placeholder="Tour Package">
        </div>

<div class="row">

  <div class="form-group col-3">
    <label>
      <span class="text-danger">*</span> Price (Php)
      <small class="text-danger has-error">
        {{ $errors->has('price') ?  $errors->first('price') : '' }}
      </small>
    </label>
  <input type="text" name="price" value="" class="form-control" placeholder="Price">
  </div>


<div class="form-group col-3">
  <label>
    <span class="text-danger">*</span> No. of Night
      <small class="text-danger has-error">
        {{ $errors->has('no_night') ?  $errors->first('no_night') : '' }}
      </small>
  </label>
<input type="text" name="no_night" value="" class="form-control" placeholder="Number of Night">
</div>


<div class="form-group col-3">
  <label>
    <span class="text-danger">*</span> No. of Guest (Max)
    <small class="text-danger has-error">
      {{ $errors->has('no_guest') ?  $errors->first('no_guest') : '' }}
    </small>
  </label>
<input type="text" name="no_guest" value="" class="form-control" placeholder="Number of Guest">
</div>


<div class="form-group col-3">
  <label>
    <span class="text-danger">*</span> Quantity (Inventory)
    <small class="text-danger has-error">
      {{ $errors->has('quantity') ?  $errors->first('quantity') : '' }}
    </small>
  </label>
<input type="text" name="quantity" value="" class="form-control" placeholder="Quantity">
</div>

</div>

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Tour Package Description
    <small class="text-danger has-error">
      {{ $errors->has('tour_package_desc') ?  $errors->first('tour_package_desc') : '' }}
    </small>
  </label>
  <textarea name="tour_package_desc" class="form-control" rows="3" placeholder="Tour Package Description ..."></textarea>
</div>


<div class="form-group">
  <label>
    <span class="text-danger">*</span> What to expect
    <small class="text-danger has-error">
      {{ $errors->has('what_expect') ?  $errors->first('what_expect') : '' }}
    </small>
  </label>
  <textarea name="what_expect" class="form-control" rows="3" placeholder="What to expect ...."></textarea>
</div>

<div class="form-group">
  <label>
    <span class="text-danger">*</span> Cancelation and Refund Policy
    <small class="text-danger has-error">
      {{ $errors->has('cancelation') ?  $errors->first('cancelation') : '' }}
    </small>
  </label>
  <textarea name="cancelation" class="form-control" rows="3" placeholder="Cancelation and Refund Policy"></textarea>
</div>

<div  style="padding:5px 0px 5px;">
<hr>
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
