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
  <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green">&nbsp;Verification&nbsp;</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-times bg-red"></i>
                <div class="timeline-item">
                  
                  <h3 class="timeline-header">Merchant Profile</h3>

                  <div class="timeline-body">
                    Please update your merchant identity.
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-danger btn-sm" href="{{ route('profile_form') }}">Update</a>
                  </div>
                </div>
              </div>


              <div>
                <i class="fas fa-times bg-red"></i>
                <div class="timeline-item">
                  
                  <h3 class="timeline-header">Contact</h3>

                  <div class="timeline-body">
                    Add at least one(1) contact person.
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Add</a>
                  </div>
                </div>
              </div>


              <div>
                <i class="fas fa-times bg-red"></i>
                <div class="timeline-item">
                  
                  <h3 class="timeline-header">Addresses</h3>

                  <div class="timeline-body">
                    Add at least one(1) address.
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Add</a>
                  </div>
                </div>
              </div>


              <div>
                <i class="fas fa-times bg-red"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                  <h3 class="timeline-header"><a href="#">Required Id's or Permit</a> Add at least one(1) business permit or goverment Id.</h3>
                  <div class="timeline-body">
                    <div class="form-group">
  <label>
    Upload Business Permit
     <small class="text-danger has-error">
      {{ $errors->has('image') ?  $errors->first('image') : '' }}
    </small>
  </label>
  <input type="file" name="file" class="form-control-file">
</div>
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              
            </div>
          </div>
</div>

</div>
</section>

@endsection
