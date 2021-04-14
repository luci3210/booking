@extends('layouts.tourismo.ui')
@section('merchant')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

@endsection

@section('content')
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2></h2>
      <ol>
        <li><a href="{{ route('m-user') }}">Merchant</a></li>
        <li>Services</li>
        <li>Hotel</li>
      </ol>
    </div>
  </div>
</section>

<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="col-lg-3">
    @include('layouts.tourismo.menu')
</div>

<div class="col-lg-9">
<form action="{{ route('service-submit') }}" method="post" role="form" enctype="multipart/form-data" class="cls-profile">
  @csrf

<div class="row row-margin">

  <div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Room Name</label>
  <input type="text" class="uk-input" name="roomname" id="roomname" placeholder="Room Name">
  <div class="validate"></div>
</div>

<div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Room Description</label>
  <textarea class="form-control" name="roomdesc" rows="5" placeholder="Room Description"></textarea><br>
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-1">
<label class="labelcoz"><span class="uk-text-danger">*</span> Price (Php)</label>
  <input type="text" name="price" class="uk-input" id="price" placeholder="Price" data-rule="minlen:4">
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Number of Night </label>
  <input type="text" class="uk-input" name="numnight" id="numnight" placeholder="Number of Night">
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-1">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Number of Guest (MAX)</label>
  <input type="text" name="numguest" class="uk-input" id="numguest" placeholder="Number of Guest">
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Room Size</label>
  <input type="text" name="roomsize" class="uk-input" id="roomsize" placeholder="Room Size">
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> View Deck </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Number of Bed </label>
  <input type="text" class="uk-input" name="numbed" id="numbed" placeholder="Number og Bed">
  <div class="validate"></div><br>
</div>

<div class="col-md-12 mt-3">
  <ul uk-tab>
    <li class="uk-active"><a href=""><b>Inclusion</b></a></li>
  </ul>
</div><br>

<div class="col-md-12 form-group">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Room Facilities </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Building Facilities </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>
<div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Booking Package </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-12 mt-3">
  <ul uk-tab>
    <li class="uk-active"><a href=""><b>Location</b></a></li>
  </ul>
</div><br>

<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Country </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Region </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> District </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>


<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> City </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Municipality </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-4 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Barangay </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-12 form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> Address </label>
  <select class="uk-select" name="viewdeck">
    <option value="1">City View</option>
    <option value="2">Seaside View</option>
    <option value="3">Forest View</option>
  </select>
  <div class="validate"></div>
</div>

<div class="col-md-12 mt-3">
  <ul uk-tab>
    <li class="uk-active"><a href=""><b>Upload photos</b></a></li>
  </ul>
</div><br>

<div class="col-md-12 form-group mt-3">
      {!! csrf_field() !!}
          <div class="file-loading">
              <input id="file-1" type="file" name="file" multiple class="file" data-min-file-count="2">
          </div>
</div>


</div>


<div class="text-center"><button type="submit">Send Message</button></div>
</form>

  </div>
</div>
</div>

</section>

@endsection
@section('merchantjs')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-contact.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-address.js') }}"></script>

<!-- 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="{{ asset('ijaboCropTool-master/ijaboCropTool.min.js') }}"></script> 
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script>
       $('#file').ijaboCropTool({
          preview : '.image-previewer',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("profile-pic-crop") }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });
</script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.0/js/fileinput.min.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/themes/fa/theme.min.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "{{ route('upload_cover') }}",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),

                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            initialCaption: "The Moon and the Earth",
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });
    </script>
@endsection
