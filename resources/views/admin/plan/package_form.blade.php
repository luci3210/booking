@extends('layouts.app')

@section('content')

<section class="content">
      <div class="container-fluid">


<div class="row">
  <div class="col-12">


    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title"><i class="nav-icon fa fa-get-pocket" aria-hidden="true"></i>  Tourismo Package » <a href="" class="py-0">create</a></h3>
      </div>

      <!-- <form role="form" id="form_valid"> -->
        <form role="form" method="post" action="{{ route('planpackage-save') }}" id="form_valid">
        @csrf
      <div class="card-body">
        
        <div class="form-group">
          <label class="col-form-label">
          Package Name 
          <small class="text-danger has-error">{{ $errors->has('package_name') ?  $errors->first('package_name') : '' }}</small>
        </label>
          <input type="text" name="package_name" class="form-control" placeholder="Package Name">
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
