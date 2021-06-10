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

@if(empty($profile->user_id))
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

@else

  <div>
      <i class="fas fa-check bg-green"></i>
      <div class="timeline-item">
        
        <h3 class="timeline-header">Merchant Profile</h3>

        <div class="timeline-body">


<div class="post">
  <div class="user-block">
    <img class="img-circle img-bordered-sm" src="https://www.thegoldenscope.com/wp-content/uploads/2015/11/boracay-1b-411x308.jpg" alt="user image">
    <span class="username">
      <a href="#">{{ $profile_details->company }}</a>
    </span>
    <span class="description">{{ $profile_details->address }}</span>
  </div>

  <p>
    <b>About : </b>{{ $profile_details->about }}
  </p>
  <p  style="margin-top:-10px;">
    <b>Email : </b>{{ $profile_details->email }}
  </p>
  <p  style="margin-top:-10px;">
    <b>Tel/Phone No : </b>{{ $profile_details->telno }}
  </p>
  <p  style="margin-top:-10px;">
    <b>Website  : </b>{{ $profile_details->website }}
  </p>
</div>


        </div>
        <div class="timeline-footer">
          <a class="btn btn-danger btn-sm" href="{{ route('profile_form') }}">Edit</a>
        </div>
      </div>
  </div>
@endif

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

@if(empty($profile_address->prof_id))
  <div>
    <i class="fas fa-times bg-red"></i>
    <div class="timeline-item">
      
      <h3 class="timeline-header">Addresses</h3>

      <div class="timeline-body">
        Add at least one(1) address.sss
      </div>
      <div class="timeline-footer">
        <a href="{{ route('profile_address_form') }}" class="btn btn-primary btn-sm">Add</a>
      </div>
    </div>
  </div>
@else 
  <div>
    <i class="fas fa-check bg-green"></i>
    <div class="timeline-item">
      
      <h3 class="timeline-header">Addresses</h3>

      <div class="timeline-body">
        <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">90%</span></td>
                    </tr>
                  </tbody>
                </table>
      </div>
      <div class="timeline-footer">
        <a class="btn btn-primary btn-sm">Add</a>
      </div>
    </div>
  </div>
@endif

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
