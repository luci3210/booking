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
        <h3 class="card-title"><i class="nav-icon fa fa-product-hunt" aria-hidden="true"></i> {{ $locations->names }} </h3>
      </div>

    <div class="card-body">
<!-- 
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    
    @forelse($get_location_id as $location)
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{ $location->name }}</a>
    @empty
    <p> No data  found!</p> 
    @endforelse

  </div>
</nav> -->

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">

    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data</a>

    <a class="nav-item nav-link" id="nav-building-tab" data-toggle="tab" href="#nav-building-facilities" role="tab" aria-controls="nav-building-facilities" aria-selected="false">Form</a>

  </div>
</nav>

<br>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


    
    <table class="table table-bordered">
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Country/State</th>
              <th>Region</th>
              <th>District</th>
              <th>City</th>
              <th>Municipality</th>
              <th>Barangay</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($getcountry as $country)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td><b>{{ $country->country }}</b></td>
              <td>null</td>
              <td>null</td>
              <td>null</td>
              <td>null</td>
              <td>null</td>
              
              <td class="text-center">
                <div class="uk-button-group">
                  <a href="{{ route('profile-contact-edit',$country->id) }}" class="uk-button uk-button-primary uk-button-small">Edit</a>
                  <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-{{$country->id}}').submit();" class="uk-button uk-button-danger uk-button-small">Delete</a><form id="delete-{{$country->id}}" method="get" action="{{ route('profile-contact-delete',$country->id) }}" style="display: none;">

              @csrf
              </form>
                  </div>
              </td>
            </tr>
            @empty
            <p> No data  found!</p> 
            @endforelse
        </tbody>

        <tbody>
        </tbody>
      </table>
  </div>
<div class="tab-pane fade" id="nav-building-facilities" role="tabpanel" aria-labelledby="nav-building-tab">    
<form role="form" method="post" action="{{ route('store_country_state',$locations->id) }}" id="form_valid">
@csrf
<div class="row">
<div class="col-sm-8">
<div class="form-group">
<label>Country/Region</label>
<input type="text" class="form-control" name="country" placeholder="Country/Region">
</div>
</div>
    
<div class="col-sm-4">
<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
  <option value="1">Active</option>
  <option value="2">Inactive</option>
</select>
</div>
</div>
</div>
<button type="submit" class="btn btn-info float-right">Save</button>
<br>
<br>
<br>

</form>

  </div>

</div>
    </div>
        
       <div class="card-footer clearfix">
      

        <ul class="pagination pagination-sm m-0 float-left">
            {{ $getcountry->links() }}
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</section>

@endsection
