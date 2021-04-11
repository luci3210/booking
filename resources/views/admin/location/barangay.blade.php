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
        <h3 class="card-title"><i class="nav-icon fa fa-bars" aria-hidden="true"></i> {{ $locations->names }} </h3>
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
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> {{ $locations->names }} list</a>
    <a class="nav-item nav-link" id="nav-building-tab" data-toggle="tab" href="#nav-building-facilities" role="tab" aria-controls="nav-building-facilities" aria-selected="false">Add form</a>
  </div>
</nav>
<br>


<form name="search_region" method="GET" action="{{ route('search_region',$locations->locid) }}">
  @csrf
<div class="input-group mb-3">
    <input type="text" class="form-control" name="search" placeholder="Search Country">
    <span class="input-group-append">
      <button type="submit" class="btn btn-info">Search</button>
      <a href="{{ route('locations',$locations->locid) }}" class="btn btn-info active">Refresh</a>
    </span>
  </div>
</form>


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
            @forelse($in_barangay as $list)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $list->country }}</td>
              <td>{{ $list->region }}</td>
              <td>{{ $list->district }}</td>
              <td>{{ $list->city }}</td>
              <td>{{ $list->municipality }}</td>
              <td><b>{{ $list->barangay }}</b></td>
              <td class="text-center">
                <div class="uk-button-group">
                  
                <a href="http://127.0.0.1:8000/admin/tourismo/ph/page/4/inclusion/14" class="btn btn-sm btn-primary py-0">Edit »</a>
                <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-14').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
                <form id="delete-{{$list->district_id}}" method="get" action="" style="display: none;">

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


        <ul class="pagination pagination-sm m-0 float-left">
            {{ $in_barangay->links() }}
        </ul>


  </div>
<div class="tab-pane fade" id="nav-building-facilities" role="tabpanel" aria-labelledby="nav-building-tab">    
<form role="form" method="post" action="{{ route('submit_barangay',$locations->locid) }}" id="form_valid">
@csrf
<div class="row">

<div class="col-sm-4">
<div class="form-group">

<label>Country</label>
<select class="form-control country" name="country" id="countryid">
  <option value="0" disabled="true" selected="true">-Select Country-</option>
  @forelse($get_country as $country)
  <option value="{{ $country->id }}">{{ $country->country }}</option>
   @empty
    <option>No data found!</option>
  @endforelse
</select>

</div>
</div>

<div class="col-sm-4">
<div class="form-group">
  <label>Region</label>
<select class="form-control" name="region" id="regionid">
  <option value="0" disabled="true" selected="true">-Select Region-</option>
</select>
</div>
</div>

<div class="col-sm-4">
<div class="form-group">
<label>District</label>
<select class="form-control" name="district" id="districtid">
  <option value="0" disabled="true" selected="true">-Select District-</option>
</select>
</div>
</div>


<div class="col-sm-3">
<div class="form-group">
<label>City</label>
<select class="form-control" name="city" id="cityid">
  <option value="0" disabled="true" selected="true">-Select City-</option>
</select>
</div>
</div>

<div class="col-sm-3">
<div class="form-group">
<label>Municipality</label>
<select class="form-control" name="municipality" id="municipalityid">
  <option value="0" disabled="true" selected="true">-Select Municipality-</option>
</select>
</div>
</div>


<div class="col-sm-3">
<div class="form-group">
<label>Barangay</label>
<input type="text" name="barangay" class="form-control" placeholder="Barangay">
</div>
</div>

<div class="col-sm-3">
<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
  <option disabled="true" selected="true">-Select Status-</option>
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
      
      </div>
    </div>
  </div>
</div>
</div>
</section>

@endsection
@section('third_party_scripts')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script>
      $(document).ready(function () {
      
      $('#countryid').on('change', function () {

        let id = $(this).val();
        
        $('#regionid').empty();
        $('#regionid').append(`<option value="0" disabled selected>Searching . . .</option>`);
        $.ajax( {
           type: 'GET',
           url: '/admin/location/region/select/' + id,
           
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            
            $('#regionid').empty();
      
            $('#regionid').append(`<option value="0" disabled selected>-Select Region-</option>`);
            response.forEach(element => {
            $('#regionid').append(`<option value="${element['id']}">${element['region']}</option>`);
          });
      
      }
  });
});

      $('#regionid').on('change', function () {

        let id = $(this).val();
        
        $('#districtid').empty();
        $('#districtid').append(`<option value="0" disabled selected>Searching . . .</option>`);
        $.ajax( {
           type: 'GET',
           url: '/admin/location/district/select/' + id,
           
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            
            $('#districtid').empty();
      
            $('#districtid').append(`<option value="0" disabled selected>-Select District-</option>`);
            response.forEach(element => {
            $('#districtid').append(`<option value="${element['id']}">${element['district']}</option>`);
          });
      
      }
  });
});

      $('#districtid').on('change', function () {

        let id = $(this).val();
        
        $('#cityid').empty();
        $('#cityid').append(`<option value="0" disabled selected>Searching . . .</option>`);
        $.ajax( {
           type: 'GET',
           url: '/admin/location/city/select/' + id,
           
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            
            $('#cityid').empty();
      
            $('#cityid').append(`<option value="0" disabled selected>-Select City-</option>`);
            response.forEach(element => {
            $('#cityid').append(`<option value="${element['id']}">${element['city']}</option>`);
          });
      
      }
  });
});


   $('#cityid').on('change', function () {

        let id = $(this).val();
        
        $('#municipalityid').empty();
        $('#municipalityid').append(`<option value="0" disabled selected>Searching . . .</option>`);
        $.ajax( {
           type: 'GET',
           url: '/admin/location/municipality/select/' + id,
           
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            
            $('#municipalityid').empty();
      
            $('#municipalityid').append(`<option value="0" disabled selected>-Select Municipality-</option>`);
            response.forEach(element => {
            $('#municipalityid').append(`<option value="${element['id']}">${element['municipality']}</option>`);
          });
      
      }
  });
});

});


</script>
@endsection
