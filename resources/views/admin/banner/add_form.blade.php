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
        <h3 class="card-title">Manage Banner » <a href="" class="py-0">create</a></h3>
      </div>

      <!-- <form role="form" id="form_valid"> -->
<form role="form" method="POST" action="{{ route('banner_submit_form') }}" enctype="multipart/form-data">
@csrf

<div class="card-body">


<div class="form-group">
  <label class="col-form-label">
    Short Description
    <small class="text-danger has-error">
      {{ $errors->has('short_desc') ?  $errors->first('short_desc') : '' }}
    </small>
  </label>
<input type="text" name="short_desc" value="" class="form-control" placeholder="Long Description">
</div>


<div class="form-group">
  <label class="col-form-label">
    Long Description
    <small class="text-danger has-error">
      {{ $errors->has('long_desc') ?  $errors->first('long_desc') : '' }}
    </small>
  </label>
<input type="text" name="long_desc" value="" class="form-control" placeholder="Long Description">
</div>


<div class="form-group">
  <label class="col-form-label">
    Location
    <small class="text-danger has-error">
      {{ $errors->has('location') ?  $errors->first('location') : '' }}
    </small>
  </label>

<select class="form-control" name="location">
  <option>-Select Location-</option> 
  <option value="1">Home Banner</option>
  <option value="2">Local Destination Banner</option>
  <option value="3">Internal Destination Banner</option>
  <option value="4">Tourismo Exclusive Banner</option>
</select>
</div>


<div class="form-group">
  <label class="col-form-label">
    Status
    <small class="text-danger has-error">
      {{ $errors->has('ts') ?  $errors->first('ts') : '' }}
    </small>
  </label>

<select class="form-control" name="ts">
  <option>-Select Status-</option> 
  @foreach($status as $list)
  <option value="{{ $list->id }}">{{ $list->status }}</option>            
  @endforeach 
</select>
</div>



<div class="form-group">
  <label for="exampleFormControlFile1">
    Upload Image
     <small class="text-danger has-error">
      {{ $errors->has('image') ?  $errors->first('image') : '' }}
    </small>
  </label>
  <input type="file" name="file" class="form-control-file">
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
@section('third_party_scripts')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script>
      $(document).ready(function () {
      $('#countryid').on('change', function () {
      let id = $(this).val();
      $('#destrictid').empty();
      $('#destrictid').append(`<option value="0" disabled selected>Searching . . .</option>`);
      $.ajax({
      type: 'GET',
      url: '/admin/tourismo/destination/provices/a/' + id,
      success: function (response) {
      var response = JSON.parse(response);
      console.log(response);   
      $('#destrictid').empty();
      $('#destrictid').append(`<option value="0" disabled selected>-Select Region-</option>`);
      response.forEach(element => {
          $('#destrictid').append(`<option value="${element['id']}">${element['district']}</option>`);
          });
      }
  });
});
});
</script>
@endsection
