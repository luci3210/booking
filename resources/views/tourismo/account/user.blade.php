

@extends('layouts.tourismo.ui')
@section('merchant')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <style type="text/css">
    .uk-text-small {
      font-size: 11px !important;
    }
  </style>
@endsection

@section('content')

<style>

  .pointer{
    cursor: pointer!important;
  }
</style>
<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="col-lg-3">
    @include('layouts.tourismo.acnt_menu', ['profilePic' => $data['data']['account'][0]->profpic ])
</div>

<div class="col-lg-9">
  <form action="{{ route('accnt_profile_update',$data['data']['account'][0]->id) }}" method="post" role="form" class="cls-profile">

  @method('patch')
  @csrf

  <div class="row row-margin">

    <div class="uk-muted-padd">
        <div class="uk-background-primary uk-padding uk-light">
            <p>This information is used to autofill your details to make it quicker for you to book. Your details will be stored securely and won't be shared publicly.</p>
        </div>
    </div>

    <div class="col-md-12 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> <b>Display Name</b></label>
    <input type="text" class="uk-input" name="name" id="name" value="{{ $data['data']['account'][0]->name }}" placeholder="Display Name">
    <div class="validate uk-text-danger uk-text-small">{{ $errors->has('name') ?  $errors->first('name') : '' }}</div>
    </div>

    <div class="col-md-4 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> First Name</label>
    <input type="text" class="uk-input" name="fname" id="fname" value="{{ $data['data']['account'][0]->fname }}" placeholder="First Name">
    <div class="validate uk-text-danger uk-text-small">{{ $errors->has('fname') ?  $errors->first('fname') : '' }}</div>
    </div>

    <div class="col-md-4 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> Last Name</label>
    <input type="text" class="uk-input" name="lname" id="lname" value="{{ $data['data']['account'][0]->lname }}" placeholder="Last Name">
    <div class="validate uk-text-danger uk-text-small">{{ $errors->has('lname') ?  $errors->first('lname') : '' }}</div>
    </div>

    <div class="col-md-4 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> Middle Name</label>
    <input type="text" class="uk-input" name="mname" id="mname" value="{{ $data['data']['account'][0]->mname }}" placeholder="Middle Name">
    <div class="validate uk-text-danger uk-text-small">{{ $errors->has('mname') ?  $errors->first('mname') : '' }}</div>
    </div>
    <div class="col-md-3 form-group mt-3">
      <div class="uk-margin">
        <label class="labelcoz"><span class="uk-text-danger">*</span> Country</label>
          <select class="uk-select" name="country">
          <option value="" >
            select country...
          </option>
          @if($data['data']['country'])
            @foreach($data['data']['country'] as $info)
          
                @if($data['data']['account'][0]->country  == $info->id)
                <option value="{{$info->id}}"  selected>
                     {{ $info->country }}
                </option>
                @else
                <option value="{{$info->id}}"  >
                     {{ $info->country }}
                </option>
                @endif
            @endforeach
          @endif
          </select>
          <div class="validate uk-text-danger uk-text-small">{{ $errors->has('country') ?  $errors->first('country') : '' }}</div>
      </div>
    </div>

    <div class="col-md-3 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> Phone Number</label>
    <input type="text" class="uk-input" name="pnumber" id="pnumber" value="{{ $data['data']['account'][0]->pnumber }}" placeholder="Phone Number">
    <div class="validate uk-text-danger uk-text-small">{{ $errors->has('pnumber') ?  $errors->first('pnumber') : '' }}</div>
    </div>

    <div class="col-md-3 form-group mt-3 pointer">
      <a class="pointer" href="{{route('show_resend_email', '?data='.base64_encode($data['data']['account'][0]->email))}}">
        <label class="labelcoz pointer"><span class="uk-text-danger">*</span> Email 
          @if($data['data']['account'][0]->email_verified_at)
            <span class="text-success">Verified</span> 
          @else
          <span class="text-danger">Please verify</span> 
          @endif
        </label>
        <input type="text" class="uk-input pointer" value="{{ $data['data']['account'][0]->email }}" placeholder="Email" disabled="disabled">
      </a>
    </div>

    <div class="col-md-3 form-group mt-3">
      <label class="labelcoz"><span class="uk-text-danger">*</span> Birthdate</label>
      <input type="date" class="uk-input" name="bdate" id="bdate" value="{{ $data['data']['account'][0]->bdate }}" placeholder="Birthdate">
      <div class="validate uk-text-danger uk-text-small">{{ $errors->has('bdate') ?  $errors->first('bdate') : '' }}</div>
    </div>
  

    <div class="col-md-12 form-group mt-3">
    <label class="labelcoz"><span class="uk-text-danger">*</span> Address</label>
    <input type="text" class="uk-input" name="address" id="address" value="{{ $data['data']['account'][0]->address }}" placeholder="Address">
          <div class="validate uk-text-danger uk-text-small">{{ $errors->has('address') ?  $errors->first('address') : '' }}</div>
    </div>


    <div class="text-left"><br>
      <button type="submit" class="uk-button uk-button-primary">Update</button>
    </div>
    </div> 

  </form>
</div>
</div>
</div>


</section>
@endsection

@section('js')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-contact.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-address.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="{{ asset('ijaboCropTool-master/ijaboCropTool.min.js') }}"></script> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
       $('#file').ijaboCropTool({
          preview : '.image-previewer',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("user_profile_upload") }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             Swal.fire(
              'Upload Success',
              message,
              'success'
            )
            setTimeout(()=>{ window.location.reload()},1500)
          },
          onError:function(message, element, status){
            alert(message);
            console
          }
       });
  </script>
  
@endsection
