@extends('layouts.tourismo.ui')
@section('merchant')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('ijaboCropTool-master/ijaboCropTool.min.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('content')

<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="uk-background-tph">
    <div class="uk-background-primary uk-light uk-padding uk-panel">
        <p class="uk-h4">Account ID : 1455256669th2a0</p>
    </div>
</div>


  <div class="col-lg-3">
      @include('layouts.tourismo.menu')
  </div>

<div class="col-lg-9">
  <form action="{{ route('accnt_profile_update',$account->id) }}" method="post" role="form" class="cls-profile">

  @method('patch')
  @csrf

  <div class="row row-margin">

    <div class="uk-muted-padd">
        <div class="uk-background-muted uk-padding uk-panel">
            <h3 class="uk-card-title">Account Information</h3>
            <p>This information is used to autofill your details to make it quicker for you to book. Your details will be stored securely and won't be shared publicly.</p>
        </div>
    </div>

    <div class="col-md-12 form-group mt-3">
    <label class="labelcoz"><b>Display Name</b></label>
    <input type="text" class="uk-input" name="name" id="name" value="{{ $account->name }}" placeholder="Display Name">
    <div class="validate"></div>
    </div>

    <div class="col-md-4 form-group mt-3">
    <label class="labelcoz">First Name</label>
    <input type="text" class="uk-input" name="fname" id="fname" value="{{ $account->fname }}" placeholder="First Name">
    <div class="validate"></div>
    </div>

    <div class="col-md-4 form-group mt-3">
    <label class="labelcoz">Last Name</label>
    <input type="text" class="uk-input" name="lname" id="lname" value="{{ $account->lname }}" placeholder="Last Name">
    <div class="validate"></div>
    </div>

    <div class="col-md-4 form-group mt-3">
    <label class="labelcoz">Middle Name</label>
    <input type="text" class="uk-input" name="mname" id="mname" value="{{ $account->mname }}" placeholder="Middle Name">
    <div class="validate"></div>
    </div>

    <div class="col-md-3 form-group mt-3">
      <div class="uk-margin">
        <label class="labelcoz">Country</label>
          <select class="uk-select" name="country">
              @foreach($country as $list)
                <option value="11" selected="selected">
                 {{ $list->id }}
                </option>
              @endforeach
          </select>
      </div>
    </div>

    <div class="col-md-3 form-group mt-3">
    <label class="labelcoz">Phone Number</label>
    <input type="text" class="uk-input" name="pnumber" id="pnumber" value="{{ $account->pnumber }}" placeholder="Phone Number">
    <div class="validate"></div>
    </div>

    <div class="col-md-3 form-group mt-3">
    <label class="labelcoz">Email</label>
    <input type="text" class="uk-input" value="{{ $account->email }}" placeholder="Email" disabled="disabled">
    <div class="validate"></div>
    </div>

      <div class="col-md-3 form-group mt-3">
    <label class="labelcoz">Birthdate</label>
    <input type="text" class="uk-input" name="bdate" id="bdate" value="{{ $account->bdate }}" placeholder="Birthdate">
    <div class="validate"></div>
    </div>
  

    <div class="col-md-12 form-group mt-3">
    <label class="labelcoz">Address</label>
    <input type="text" class="uk-input" name="address" id="address" value="{{ $account->address }}" placeholder="Address">
    <div class="validate"></div>
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

@section('js')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-contact.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-address.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="{{ asset('ijaboCropTool-master/ijaboCropTool.min.js') }}"></script> 
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
@endsection
@endsection
