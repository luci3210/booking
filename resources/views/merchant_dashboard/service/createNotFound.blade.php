@extends('layouts.merchant-app')

@section('content')

<section class="content">

  <div class="lockscreen-wrapper">
    
    <div class="lockscreen-logo">
      <a href="../../index2.html">401 <i class="fas fa-charging-station"></i></a>
    </div>

    <div class="help-block text-center">
      Unauthorized Page</i>
    </div>
    
    <div class="text-center">
      <a href="{{ route('profile_index') }}"></a>
    </div>

</div>

</section>
@endsection
