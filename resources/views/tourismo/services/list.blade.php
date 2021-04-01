@extends('layouts.tourismo.ui-user')
@section('content')

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="{{ route('myhome') }}">Home</a></li>
            <li>Settings</li>
          </ol>
        </div>

      </div>
    </section>

    <!-- <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200"> -->
<section>
<div class="container">

<div class="row">
<div class="col-md-3">
 @include('layouts.tourismo.menu')
</div>

<div class="col-md-9">
  <div class="card card-primary card-outline">

    <div class="card-primary">
      <ul class="nav nav-pills">
        @forelse($product as $producs)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('services-id',$producs->id ) }}" data-toggle="tab">
            {{ $producs->name }}         
          </a>
        </li>
        @empty
          <h2>No service is found!</h2>
        @endforelse
      </ul>
      <hr>
    </div>

<div class="card-body">
  <div class="tab-content">
    <div class="active tab-pane" id="activity">

      <div class="post">        



        <table class="table table-bordered">
        
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Price</th>
              <th>Scope</th>
              <th>Package</th>
              <th>Status</th>
              <th>Created Date</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
          @forelse($list as $listing)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $listing->name }}</td>
              <td>{{ $listing->name }}</td>
              <td>{{ $listing->name }}</td>
              <td>{{ $listing->name }}</td>
              <td>{{ $listing->name }}</td>
              <td>{{ $listing->name }}</td>
              <td class="text-center">
                <a href="{{ route('plan-edit',$listing->id) }}" class="btn btn-sm btn-primary py-0">Edit »</a>
                <a href="" onclick="if(confirm('Are sure, you want to delete this plan?'))event.preventDefault(); document.getElementById('delete-{{$listing->id}}').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
                  <form id="delete-{{$listing->id}}" method="get" action="{{route('plan-delete',$listing->id)}}" style="display: none;">
                  @csrf
                </form>
              </td>
            </tr>
          @empty
            <p> No listing found!</p> 
          @endforelse
        </tbody>
        
        </table>
  


      </div>

    </div>
  </div>
</div>

</div>
</div>

</div>
</section>

@endsection
