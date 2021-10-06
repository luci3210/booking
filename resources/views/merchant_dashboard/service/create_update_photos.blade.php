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
  </div>
</div>


<div class="col-md-9">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
      </ul>
    </div>
<div class="card-body">

<div class="post">
 

@csrf
          <div class="file-loading">
              <input id="file-1" type="file" name="file" multiple class="file" data-min-file-count="2">
          </div>


</div>


  <!-- /.tab-content -->
</div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>




</div>












<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
          Service » {{ $service_name->name }} » Upload 
            <a href="{{ route('service_listing_create_post',$service_name->description) }}" class="py-0"></a>

      </div>

<div class="card-body">


<div class="row d-flex align-items-stretch">

<div class="col-12 col-sm-2">
  <div class="card card-primary card-outline card-outline-tabs">
  
    <div class="card-body">
      
<div class="text-center">
  <img src="/image/cover/2021/{{ $service_post->cover == '' ? 'default.png' : $service_post->cover }}" alt="" class="cover_preview" style="width:100px; height: 110px;">
</div><br>

<div class="card-footer">
  <div class="text-left">
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="cover_pic" id="cover_pic">
      <label class="custom-file-label" for="customFile">Upload Cover Here!</label>
    </div>
  </div>
</div>


    </div>

  </div>
</div>

<div class="col-12 col-sm-10">
  <div class="card card-primary card-outline card-outline-tabs">
    <div class="card-body">
      
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <h5><i class="fas fa-exclamation-circle"></i> Please continue and upload photos for</h5>
</div>


<div class="table-responsive">
  <table class="table">
    <tbody><tr>
      <th style="width:50%">{{ $service_name->name }}</th>
      <td>{{ $service_post->tour_name }}</td>
    </tr>
    <tr>
      <th>Price</th>
      <td>{{ $service_post->price }}</td>
    </tr>
    <tr>
      <th>No. of night</th>
      <td>{{ $service_post->nonight }}</td>
    </tr>
    <tr>
      <th>No.guest</th>
      <td>{{ $service_post->noguest }}</td>
    </tr>
  </tbody></table>
</div>


    </div>
  </div>
</div>



<!-- <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch">
  <div class="card">
    <div class="card-header text-muted border-bottom-0">
      Upload Cover Photo here!
    </div>
    <div class="card-body pt-0">
      <div class="row">
       
        <div class="col-6 text-center">
          <img src="/image/cover/2021/{{ $service_post->cover == '' ? 'default.png' : $service_post->cover }}" alt="" class="cover_preview" style="width:190px; height: 200px;">
        </div>

      </div>
    </div>
    <div class="card-footer">
      <div class="text-left">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="cover_pic" id="cover_pic">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
      
      </div>
    </div>




  </div>
</div>
 -->          
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
