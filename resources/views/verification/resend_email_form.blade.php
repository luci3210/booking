@extends('layouts.tourismo.ui')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>

.mh-100{
    min-height: 80vh;
}

</style>
<div class="container h-100 mh-100">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
        <p class="m-0"> <strong>{{session('success')}}!</strong> Please check your email for verification</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card col-md-6 offset-md-3">
        <div class="card-body">
            <form method="POST" action="{{route('resend_email')}}">
            {{ csrf_field() }}
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend text-center">Resend Email Verification</legend>

                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                            <input class="uk-input" type="text" placeholder="Email" id="email" type="email" name="email" value="{{ $data }}" required autofocus readonly>
                        </div>
                        @if ($errors->has('email'))
                        <div class="text-left">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        @endif
                        <div class="text-center" >
                            <button class="uk-button uk-button-default uk-button-small mt-2">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    

</div>
@endsection
@section('js')
<script>
$(document).ready(function(){
    

});

</script>

@endsection
