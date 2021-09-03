@extends('layouts.app')

@section('content')

<section class="content">
      <div class="container-fluid">


<div class="row">
  <div class="col-12">


    <div class="card">
    
      <div class="card-header">
        <h3 class="card-title">Tourismo Product » <a href="{{ route('product-create') }}" class="py-0">create</a></h3>
      </div>

        <form role="form" method="post" action="{{ route('product-store-update',$product->id) }}" id="form_valid">
        @csrf
        @method('patch')

      <div class="card-body">
        
        <div class="form-group">
          <label class="col-form-label">
          Product Name 
          <small class="text-danger has-error">{{ $errors->has('product_name') ?  $errors->first('product_name') : '' }}</small>
          </label>
          <input type="text" name="product_name" value="{{ $product->name }}" class="form-control" placeholder="Product Name">
        </div>
        
        <div class="form-group">
          <label class="col-form-label">
          Product Description
          <small class="text-danger has-error">{{ $errors->has('product_description') ?  $errors->first('product_description') : '' }}</small>
        </label>
          <input type="text" name="product_description" value="{{ $product->description }}" class="form-control"placeholder="Product Description">
        </div>
      
        <div class="form-group">
          <label class="col-form-label">
          Status
          <small class="text-danger has-error">{{ $errors->has('product_status') ?  $errors->first('product_status') : '' }}</small>
        </label>
          <input type="text" name="product_status" value="{{ $product->temp_status }}" class="form-control" placeholder="Product Status">
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
