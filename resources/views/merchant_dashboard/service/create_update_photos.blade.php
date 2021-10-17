@extends('layouts.merchant-app')

@section('third_party_stylesheets')

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
      <li class="breadcrumb-item"><a href="{{ route('service_listing',$service_name->description) }}">Hotel</a></li>
      <li class="breadcrumb-item active" aria-current="page">Uplaod Images</li>
    </ol>
    </nav>
    </div>
  </div>


    <div class="row">

      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body">
          
          <h5 class="mt-2 mb-4">Upload Image 
            <small class="text-danger has-error">
              {{ $errors->has('photos') ?  $errors->first('photos') : '' }}
            </small>
          </h5>

  <form action="{{ route('m_upload_service_photos',$service_post->id) }}" method="post"  enctype="multipart/form-data">
  @csrf
            <div class="form-group">


            <div class="user-image mb-3 text-center">
                <div class="imgPreview"> </div>
            </div>

    
              <div class="custom-file">
                <input type="file" name="photos[]" class="custom-file-input" id="images" multiple="multiple">
                <label class="custom-file-label" for="customFile">Select Image</label>
              </div>

              <button type="submit" class="btn btn-block btn-secondary btn-block mt-3">Upload Image</button>
            
            </div>
            
            <div class="form-group">
            </div>
  </form>

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
<script src="{{ asset('js/bs-custom-file-input.min.js') }}" defer></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>


<!-- <script>
  $(function() {
  var multiImgPreview = function(input, imgPreviewPlaceholder) {

      if (input.files) {
          var filesAmount = input.files.length;

          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();

              reader.onload = function(event) {
                  $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
              }

              reader.readAsDataURL(input.files[i]);
          }
      }

  };

  $('#images').on('change', function() {
      multiImgPreview(this, 'div.imgPreview');
  });
  });    
</script> -->
@endsection
