@extends('layouts.merchant-app')

@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<style>
    .container {
        max-width: 500px;
    }
    dl, ol, ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .imgPreview img {
        max-width: 200px;
        border-radius: 15px !important;
        padding: 8px;
    }
    .breadcrumb {
    margin-bottom: 0;
    background-color:#6C3483;
    }
    .breadcrumb  .breadcrumb-item {
      color: #BB8FCE;
    }
    .breadcrumb a{
      color: #fff;
    }
    .breadcrumb a:hover {
     color: #BB8FCE; 
    }
</style>
@endsection

@section('content')
<section class="content">
  <div class="container-fluid">

  <div class="row">
    <div class="col-12">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-home"></i></a></li>
      <li class="breadcrumb-item"><a href="#">Post Service</a></li>
      <li class="breadcrumb-item"><a href="{{-- route('service_listing',$data->name) --}}">Hotel</a></li>
      <li class="breadcrumb-item active" aria-current="page">Uplaod Cover</li>
    </ol>
    </nav>
    </div>
  </div>


    <div class="row">

      <div class="col-12">
        <div class="card mt-3">
  <div class="row justify-content-md-center mb-4">
    <div class="col col-lg-1">
      <!-- ------- null ---------- -->
    </div>
    
    <div class="col-md-auto">
      <br>
      <div class="custom-file input-group input-group-sm mb-4 mt-4">
        <input type="file" class="custom-file-input input-group input-group-sm" name="cover_pic" id="cover_pic">
        <label class="custom-file-label" for="customFile">Upload Cover</label>
      </div>
    
    </div>
    
    <div class="col col-lg-1">
      <!-- ------- null ---------- -->
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('ijaboCropTool-master/ijaboCropTool.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
       $('#cover_pic').ijaboCropTool({
          preview:'.cover_preview',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUsIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("upload-cover",[$data->id,$data->upload_id])}}',
          withCSRF:['_token','{{ csrf_token() }}'],
           onSuccess:function(message, element, status){
             Swal.fire(
              'Upload Success',
              message,
              'success'
            )
            setTimeout(()=>{ window.location.reload()},1500)

          // var url = "http://127.0.0.1:8000/merchant.dashboard/service/hotel_and_resort";
          //   $(location).attr('href',url);
          },

          onError:function(message, element, status){
            alert(message);
            console
          }

       });
  </script>

@endsection
