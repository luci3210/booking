@extends('layouts.tourismo.ui')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>

.mh-100{
    min-height: 80vh;
}

</style>
<div class="container h-100 mh-100">
    @if($statusRes == 'success')
    <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
        <p class="m-0"> <strong>{{$statusRes}}!</strong> Please check your email for receipt</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if($statusRes == 'failed' || $statusRes == 'cancel')
    <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
        <p class="m-0"> <strong>{{$statusRes}}!</strong>  you canceled your booking or something went wrong</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if($statusRes == 'pending')
    <div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
        <p class="m-0"> <strong>{{$statusRes}}!</strong> your payment is under review please wait a moment</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

</div>
@endsection
@section('js')
<script>
$(document).ready(function(){
    

});

</script>

@endsection
