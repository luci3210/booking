@extends('layouts.merchant-app')
@section('third_party_stylesheets')
  <link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
@endsection

@section('content')

<section class="content">
      <div class="container-fluid">

<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          Create cover » {{ $service_name->name }} » 
          <a href="" class="py-0">
            {{ $service_post[0]->tour_name }}
          </a>
        </h3>
      </div>

    <div class="card-body">
        


<div class="row d-flex align-items-stretch">

<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
  <div class="card">
    <div class="card-header text-muted border-bottom-0">
      Digital Strategist
    </div>
    <div class="card-body pt-0">
      <div class="row">
       
        <div class="col-12 text-center">
          <img src="https://cdn.dribbble.com/users/3281732/screenshots/6552930/ef066617-ce4e-45c9-ae22-1af21711119c.jpeg" alt="" class="img-circle img-fluid">
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="text-left">
 <input type="file" name="cover_pic" id="cover_pic">
        <!-- <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div> -->
      
      </div>
    </div>
  </div>
</div>
          
</div>





    </div>
        
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-left">
        </ul>
      </div>

    </div>
  </div>
</div>

</div>
</section>
@endsection
@section('merchantjs')
<script type="text/javascript" src="{{ asset('ijaboCropTool-master/ijaboCropTool.min.js') }}"></script>
<script>
       $('#cover_pic').ijaboCropTool({

 processUrl:'{{ route('upload_cover') }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }

       });
  </script>
@endsection

