@extends('layouts.merchant-app')

@section('content')
------------------------ end modal ------------------------- -->

<section class="content">
  <div class="container-fluid">
<div class="row">
  <div class="col-md-12">

    <div class="timeline">
      

      <!-- <div class="time-label">
        @if($verify_check->verify_id == 3)
          <span class="bg-green"> Account : Fully verified </span>
        @elseif($verify_check->verify_id == 2)
          <span class="bg-yellow"> 
            Account : Need for compliance
          </span>
          <span class="bg-grey" style="border: 1px solid #ccc;"> 
            <i class="fa fa-envelope-open-o" aria-hidden="true"></i> {{ $verify_check->description }}
          </span>
        @else
          <span class="bg-red" title="Please provide, tourismo requirement"> Account : For validation</span>
        @endif
      </div> -->

@if(empty($profile_details->company))
  <div>
      <i class="fas fa-times bg-red"></i>
      <div class="timeline-item">
        
        <h3 class="timeline-header"><i class="far fa-building"></i> Profile</h3>

        <div class="timeline-body text-center">
          <p class="mt-4"><i class="fas fa-database"></i> No Profile yet, Please update.</p>
        </div>


        <div class="timeline-footer">
          <a class="btn btn-block btn-info" href="{{ route('profile_form') }}"> Update</a>
        </div>
      </div>
  </div>
@else

  <div>
      <i class="fas fa-check bg-green"></i>
      <div class="timeline-item">
        
        <h3 class="timeline-header"><i class="far fa-building"></i> Profile</h3>

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

  <p  style="margin-top:-10px;">
    <b>Services  : </b>{{ $profile_details->website }}
  </p>

</div>


        </div>
        <div class="timeline-footer">
          <a class="btn btn-danger btn-sm" href="{{ route('profile_form') }}"><i class="fas fa-user-edit"></i> Edit</a>
        </div>
      </div>
  </div>
@endif







<!-- ---------------------------- services ------------------------------ -->
<div>
<i class="fas fa-check bg-green"></i>
<div class="timeline-item">
  
  <h3 class="timeline-header"><i class="far fa-object-ungroup"></i> Services</h3>

  <div class="timeline-body">
  
  <select class="custom-select mt-2" name="services" id="select_service">
        <option value="0" disabled="true" selected="true">-Select Services-</option>
      @forelse($select_active_services as $services)
        <option value="{{ route('sp_select',$services->id) }}">{{ old('services',$services->name) }}</option>
      @empty
        <option value="">Selection is not available</option>
      @endforelse
  </select>


  <table class="table table-bordered table-sm table-hover mt-4">
    <thead>                  
      <tr class="table-default text-center">
        <th style="width: 10px">#</th>
        <th>Service</th>
        <th>Name</th>
        <th>Address</th>
        <th style="width: 40px" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse($service_profile as $services)
      <tr style="font-size:14px;">
        <td>{{ $loop->index + 1 }}</td>
        <td><i class="fas {{$services->icon_id }}"></i> {{ $services->name }}</td>
        <td>{{ $services->ps_name }} / {{$services->ps_profile_id }}</td>
        <td>{{ $services->ps_address }}</td>
        <td style="width:130px;" class="text-center">

          <div class="btn-group btn-group-sm" role="group" aria-label="...">
            
          <a class="btn btn-default btn-sm active" href="{{ route('sp_m_edit',$services->ps_id) }}">
            Edit
          </a> 
          <a class="btn btn-default btn-sm" href="">
             Post
          </a>

          </div>
        </td>
        @empty
        <td colspan="5" class="text-center">
          <p class="mt-2"><i class="fas fa-database"></i> No services found.</p>
        </td>
      </tr>
      @endforelse
    </tbody>
  </table>

  </div>

  <div class="timeline-footer">
  </div>
</div>
</div>

<!-- -------------------------------------------------------------------- -->


@if(empty($profile_permit->prof_id))
<div>
  <i class="fas fa-times bg-red"></i>
  <div class="timeline-item">
    <h3 class="timeline-header"><a href="#">Required Id's or Permit</a> Add at least one(1) business permit or goverment Id.</h3>
    <div class="timeline-body">


      <img src="http://placehold.it/150x100" alt="...">
      <img src="http://placehold.it/150x100" alt="...">
      <img src="http://placehold.it/150x100" alt="...">
      <img src="http://placehold.it/150x100" alt="...">
      <img src="http://placehold.it/150x100" alt="...">

<br>
<br>


<form action="{{ route('merchant_permit_submit') }}" method="post" role="form" id="valid-form" class="form-border" enctype="multipart/form-data">
  @csrf

<div class="form-group">
<label>
Upload Business Permit
<small class="text-danger has-error">
{{ $errors->has('file') ?  $errors->first('file') : '' }}
</small>
</label>
<input type="file" name="file" class="form-control-file">
</div>



                  </div>


<div class="timeline-footer">
<button type="submit" class="btn btn-primary"><i class="fas fa-share"></i> Submit</button>
</div>
</form>


</div>
</div>

@else 



<div>
  <i class="fas fa-check bg-green"></i>
  <div class="timeline-item">
    <h3 class="timeline-header"><a href="#">Required Id's or Permit</a> Add at least one(1) business permit or goverment Id.</h3>
    <div class="timeline-body">

@foreach($profile_permit_details as $permit)

      <img src="{{ asset('image/permit') }}/{{ $permit->permit }}" style="width: 100px; height: 150px;" alt="...">

@endforeach()
<br>
<br>

<form action="{{ route('merchant_permit_submit') }}" method="post" role="form" id="valid-form" class="form-border" enctype="multipart/form-data">
  @csrf

<div class="form-group">
<label>
  Upload Business Permit
  <small class="text-danger has-error">
  {{ $errors->has('file') ?  $errors->first('file') : '' }}
  </small>
</label>
<input type="file" name="file" class="form-control-file">
</div>

</div>

<div class="timeline-footer">
<button type="submit" class="btn btn-primary"><i class="fas fa-share"></i> Submit</button>
</div>
</form>


</div>
</div>



@endif
              <!-- END timeline item -->
              
            </div>
          </div>
</div>

</div>
</section>

@endsection

