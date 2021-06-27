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
                  <tbody>
                    <tr>
                      <td colspan="2"><b>Room Name: </b>{{ $posting->tour_name }}</td>
                    </tr>
                    
                    <tr>
                      <td style="width:200px;font-weight: bold;">Booking Details</td>
                      <td>
                        <b>Room size:</b> {{ $posting->roomsize }}, <b>View:</b> {{ $posting->viewdeck }}, <b>Max guest:</b> {{ $posting->noguest }}, <b>No. of Bed:</b> {{ $posting->nobed }} 
                      </td>
                    </tr>

                    <tr>
                      <td style="width:200px;font-weight: bold">Package</td>
                      <td>{{ $posting->booking_package }}</td>
                    </tr>

                    <tr>
                      <td style="width:200px;font-weight: bold">Room Facilities</td>
                      <td>{{ $posting->room_facilities }}</td>
                    </tr>

                    <tr>
                      <td style="width:200px;font-weight: bold">Building Facilities</td>
                      <td>{{ $posting->building_facilities }}</td>
                    </tr>

                    <tr>
                      <td  colspan="2"><span style="font-weight: bold;">Hotel Information : </span>{{ $posting->about }}</td>
                    </tr>

                    <tr>
                      <td  colspan="2"><span style="font-weight:bold">Terms & Conditions :  </span></td>
                    </tr>

                    <tr>
                      <td  colspan="2"><span style="font-weight: bold;">Location and Address : </span>{{ $posting->about }}</td>
                    </tr>

                  </tbody>
                </table>

                <div class="timeline-item">
                  <br>
                  <h5 class="timeline-header">Room Photos</h5>
                  <div class="timeline-body">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                  </div>
                </div>

                <br>  

                  <form action="{{ route('update_posting',[$posting->service_tour_id,$url])}}" method="post" class="form-horizontal">
                    @csrf
                <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Status</label>
                        <select class="form-control" name="status">
                          <option value="1">Approve</option>
                          <option value="3">For Compliance</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Select Status Message</label>
                        <select class="form-control" name="status_message">
                          <option value="1">Approve</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12">

                  <button type="submit" class="btn btn-info">Update</button>
                </div>
                </div>
</form>  

    </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
