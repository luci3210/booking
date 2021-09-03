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
        <form role="form" method="post" action="{{ route('plan-save') }}" id="form_valid">
        @csrf
      <div class="card-body">
        
        <div class="form-group">
          <label class="col-form-label">
          Plan Name 
          <small class="text-danger has-error">{{ $errors->has('plan_name') ?  $errors->first('plan_name') : '' }}</small>
        </label>
          <input type="text" name="plan_name" class="form-control" placeholder="Plan Name">
        </div>

        <div class="form-group">
          <label class="col-form-label">
          Price 
          <small class="text-danger has-error">{{ $errors->has('price') ?  $errors->first('price') : '' }}</small>
        </label>
          <input type="text" name="price" class="form-control" placeholder="Price">
        </div>

        <div class="form-group">
          <label class="col-form-label">
          Subscription
          <small class="text-danger has-error">{{ $errors->has('plan_name') ?  $errors->first('plan_name') : '' }}</small>
        </label>
          <select class="form-control" name="subscription">
            <option value="Per Month">Per Month</option>
            <option value="Per Year">Per Year</option>
            <option value="For 3 Months">For 3 Months</option>
            <option value="For 6 Months">For 6 Months</option>
            <option value="For 1 Year">For 1 Year</option>
            <option value="For 2 Years">For 2 Years</option>
            <option value="For 3 Years">For 3 Years</option>
            <option value="For 4 Years">For 4 Years</option>
            <option value="For 5 Years">For 5 Years</option>
          </select>
        </div>





<div class="form-group">
  <label>Package</label>
  <select class="itempack form-control" name="itempack[]" multiple="multiple" >
    @foreach($packagelist as $list)
    <option>{{ $list->package }}</option>
    @endforeach
  </select>
</div>

        <div class="form-group">
          <label class="col-form-label">
          Status 
          <small class="text-danger has-error">{{ $errors->has('status') ?  $errors->first('status') : '' }}</small>
        </label>
          <input type="text" name="status" class="form-control" placeholder="Status">
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
