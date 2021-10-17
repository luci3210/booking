@extends('layouts.merchant-app')
@section('third_party_stylesheets')

<link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

@endsection

@section('content')

<section class="content">
  <div class="container-fluid">

<div class="row">


<div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid" src="/image/cover/2021/{{ $service_post->cover == '' ? 'default.png' : $service_post->cover }}" alt="Cover Preview" style="border-radius: 6px;">
                </div><br>

                <div class="custom-file input-group input-group-sm mb-3">
      <input type="file" class="custom-file-input input-group input-group-sm" name="cover_pic" id="cover_pic">
      <label class="custom-file-label" for="customFile">Upload Cover</label>
    </div>

                
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        



              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

 
          </div>



  <div class="col-9">
    <div class="card">
      
      <div class="card-header">
          Service » {{ $service_name->name }} » Upload 
            <a href="{{ route('service_listing_create_post',$service_name->description) }}" class="py-0"></a>

      </div>

<div class="card-body">


<div class="row d-flex align-items-stretch">
        
</div>





          @csrf
          <div class="file-loading">
              <input id="file-1" type="file" name="file" multiple class="file" data-min-file-count="2">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.0/js/fileinput.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/themes/fa/theme.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: "{{ route('service_upload_photos',$service_post->id) }}",
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };

        },
        allowedFileExtensions: ['jpg', 'png','jpeg'],
        overwriteInitial: false,
        maxFileSize:2000,
        maxFilesNum: 10,
        initialCaption: "Please upload GreaterThan 1 and LessThan 10 photos",
         msgUploadEnd: "Image Uploded Successfully",
        slugCallback: function (filename) {

            return filename.replace('(', '_').replace(']', '_');
        
        }
    });
</script>




<script type="text/javascript" src="{{ asset('ijaboCropTool-master/ijaboCropTool.min.js') }}"></script>

<script>
       $('#cover_pic').ijaboCropTool({
          preview:'.cover_preview',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUsIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
 processUrl:'{{ route("upload-cover",$service_post->id) }}',
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
