@extends('layouts.app')

@section('content')

<section class="content">
      <div class="container-fluid">

<div class="row">
  <div class="col-12">


    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title">Manage Exclusive » <a href="" class="py-0">Update</a></h3>
      </div>

      <!-- <form role="form" id="form_valid"> -->
<form role="form" method="POST" action="{{ route('exclusive_update_submit') }}" enctype="multipart/form-data">
@csrf

<div class="card-body">


        
<div class="form-group">
  <label class="col-form-label">
    Short Description
    <small class="text-danger has-error">
      {{ $errors->has('info') ?  $errors->first('info') : '' }}
    </small>
  </label>
<input type="text" name="short_desc" value="" class="form-control"placeholder="Title of the District/Provice">
</div>
      


<div class="form-group">
  <label class="col-form-label">
    Long Description
    <small class="text-danger has-error">
      {{ $errors->has('desc') ?  $errors->first('desc') : '' }}
    </small>
  </label>
<input type="text" name="long_desc" value="" class="form-control" placeholder="About">
</div>



<div class="form-group">
  <label class="col-form-label">
    Status
    <small class="text-danger has-error">
      {{ $errors->has('desc') ?  $errors->first('desc') : '' }}
    </small>
  </label>

<select class="form-control" name="ts">
  <option>-Select Status-</option> 
  @foreach($status as $list)
  <option value="{{ $list->id }}">{{ $list->id }}</option>            
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
