@extends('layouts.merchant-app')

@section('content')

<section class="content">
  <div class="container-fluid">
<div class="row">
  <div class="col-md-12">

    <div class="timeline">
      

      <div class="time-label">
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
      </div>

@if(empty($profile_details->company))
  <div>
      <i class="fas fa-times bg-red"></i>
      <div class="timeline-item">
        
        <h3 class="timeline-header">Profile</h3>

        <div class="timeline-body">
          Please update your merchant identity.
        </div>
        <div class="timeline-footer">
          <a class="btn btn-danger btn-sm" href="{{ route('profile_form') }}"><i class="fas fa-pen-square"></i> Update</a>
        </div>
      </div>
  </div>
@else

  <div>
      <i class="fas fa-check bg-green"></i>
      <div class="timeline-item">
        
        <h3 class="timeline-header">Profile</h3>

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
          <a class="btn btn-danger btn-sm" href="{{ route('profile_form') }}"><i class="fas fa-user-edit"></i> Edit</a>
        </div>
      </div>
  </div>
@endif




@if(empty($profile_contact->prof_id))

  <div>
    <i class="fas fa-times bg-red"></i>
    <div class="timeline-item">
      
      <h3 class="timeline-header">Contact</h3>

      <div class="timeline-body">
        Add at least one(1) contact person
      </div>
      <div class="timeline-footer">
        <a class="btn btn-primary btn-sm" href="{{ route('profile_contact_form') }}"><i class="fas fa-plus-circle"></i>  Add</a>
      </div>
    </div>
  </div>

@else

  <div>
    <i class="fas fa-check bg-green"></i>
    <div class="timeline-item">
      
      <h3 class="timeline-header">Contact</h3>

      <div class="timeline-body">
          <table class="table table-bordered table-sm">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact No</th>
                      <th style="width: 40px" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($profile_contact_details as $contacts)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $contacts->prof_id }} {{ $contacts->lname }}</td>
                      <td>{{ $contacts->email }}</td>
                      <td>{{ $contacts->phonno }}</td>
                      <td style="width:130px;" class="text-center">
                        <div class="btn-group">
                        <a class="btn btn-primary btn-xs" href="{{ route('profile_contact_edit',$contacts->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                        

                        <a href="" onclick="if(confirm('Are sure, you want to delete this plan?'))event.preventDefault(); document.getElementById('delete-{{ $contacts->id }}').submit();" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> Delete</a>
                  <form id="delete-{{ $contacts->id }}" method="get" action="{{route('profile_contact_delete',$contacts->id )}}" style="display: none;">
                  @csrf
                </form>
                      </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
      </div>
      <div class="timeline-footer">
        <a class="btn btn-primary btn-sm" href="{{ route('profile_contact_form') }}"><i class="fas fa-plus-circle"></i>  Add</a>
      </div>
    </div>
  </div>

@endif



@if(empty($profile_address->prof_id))
  <div>
    <i class="fas fa-times bg-red"></i>
    <div class="timeline-item">
      
      <h3 class="timeline-header">Address</h3>

      <div class="timeline-body">
        Add at least one(1) address
      </div>
      <div class="timeline-footer">
        <a href="{{ route('profile_address_form') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Add</a>
      </div>
    </div>
  </div>
@else 
  <div>
    <i class="fas fa-check bg-green"></i>
    <div class="timeline-item">
      
      <h3 class="timeline-header">Address</h3>

      <div class="timeline-body">
        <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Address</th>
                      <th style="width: 40px" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($profile_address_details as $addresses)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $addresses->address }}</td>
                      <td style="width:130px;" class="text-center">
                        <div class="btn-group">
                        <a class="btn btn-primary btn-xs" href="{{ route('profile_address_edit',$addresses->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                        

                        <a href="" onclick="if(confirm('Are sure, you want to delete this plan?'))event.preventDefault(); document.getElementById('delete-{{ $addresses->id }}').submit();" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> Delete</a>
                  <form id="delete-{{ $addresses->id }}" method="get" action="{{route('address_delete',$addresses->id )}}" style="display: none;">
                  @csrf
                </form>
                      </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
      </div>
      <div class="timeline-footer">
        <a class="btn btn-primary btn-sm" href="{{ route('profile_address_form') }}"><i class="fas fa-plus-circle"></i> Add</a>
      </div>
    </div>
  </div>
@endif



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
