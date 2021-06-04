@extends('layouts.tourismo.ui')
@section('merchant')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/merchant101.css') }}">
@endsection

@section('content')
<section class="contact aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">
<div class="row">

<div class="col-lg-3">
      @include('layouts.tourismo.menu')
</div>





<div class="col-lg-9 form-border">
<form action="{{ route('profile-contact-add') }}" method="post" role="form" id="valid-form">
@csrf

<div class="row row-margin">

<div class="col-md-12">
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

    <ul class="uk-navbar-nav">

        <li class="uk-active"><a href="#"><b>MERCHANT</b></a></li>
        
        <li class="{{ (request()->is('merchant')) ? 'active' : '' }}">
          <a href="{{ route('m-user') }}">Profile</a>
        </li>
        
        <li class="{{ (request()->is('merchant/profile/address')) ? 'active' : '' }}">
          <a href="{{ route('create_address') }}">Address</a>
        </li>

        <li class="{{ (request()->is('merchant')) ? 'active' : '' }}">
          <a href="{{ route('profile-contact') }}">Contact</a>
        </li>

    </ul>


    </div>
</nav>
</div>

</div>
<div class="row row-margin">


<div class="form-group mt-3">
  <label class="labelcoz"><span class="uk-text-danger">*</span> First Name</label>
<input type="text" class="uk-input" name="fname" id="companyname" placeholder="First Name">
<input type="hidden" class="form-control" name="prof_id" value="{{ $gatemerchant_prof[0]->profid }}">
<div class="validate"></div>
</div>

<div class="form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Last Name</label>
<input type="text" class="uk-input" name="lname" placeholder="Last Name">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> E-mail</label>
<input type="text" class="uk-input" name="email" id="email" placeholder="E-mail">
<div class="validate"></div>
</div>

<div class="col-md-6 form-group mt-3">
<label class="labelcoz"><span class="uk-text-danger">*</span> Mobile No. <b>Ex: 09107788999</b></label>
<input type="text" class="uk-input" name="mobileno" id="mobileno" placeholder="Mobile Number">
<div class="validate"></div>
</div>

<div class="text-left"><br><button type="submit" class="btn btn-primary btn-block">Save</button></div>   

</div>

</form>



  <ul uk-tab="" class="uk-tab">
    <li class="uk-active"><a href="">Address list </a></li>
  </ul>

@if(count($contact) >= 1) 
<div class="uk-overflow-auto">
    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
        <thead>
            <tr>
                <th class="uk-table-shrink">No.</th>
                <th class="uk-table-expand">Name</th>
                <th class="uk-table-expand">E-mail</th>
                <th class="uk-table-expand">Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contact as $list)
            <tr>
                <td class="tbl-labelcoz uk-text-center">{{ $loop->index + 1 }}</td>
                <td class="uk-table-link tbl-labelcoz">{{ $list->fname }} {{ $list->fname }}</td>
                <td class="uk-table-link tbl-labelcoz">{{ $list->email }}</td>
                <td class="uk-table-link tbl-labelcoz">{{ $list->phonno }}</td>
                <td class="uk-text-nowrap">
                  
                  <button class="uk-button uk-button-primary uk-button-small" type="button">Edit</button>
                  
                  <a href="" onclick="if(confirm('Do you want to delete this contact?  {{ $list->fname }}'))event.preventDefault(); document.getElementById('delete-{{$list->id}}').submit();" class="uk-button uk-button-danger uk-button-small">Delete</a>    
                                
                  <form id="delete-{{ $list->id }}" method="get" action="{{ route('delete_address',$list->id) }}" style="display: none;">
                    @csrf
                  </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else 
  <br><p class="uk-text-norma uk-text-center">Empty!</p></span> 
@endif


</div>

@section('merchantjs')
<script src="{{ asset('public/merchant-validation/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('public/merchant-validation/profile-add-edit-contact.js') }}"></script>
@endsection
@endsection
