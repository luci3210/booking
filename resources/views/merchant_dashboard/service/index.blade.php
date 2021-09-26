@extends('layouts.merchant-app')

@section('content')

<section class="content">
  <div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-box-open"></i> {{ $service_name->name }} » 
          <a href="{{ route('service_listing_create_post',$service_name->description) }}" class="py-0">Create Post</a>
        </h3>
      </div>

    <div class="card-body">
        <table class="table table-bordered table-sm">
        <thead>                  
            <tr>
              <th>No.</th>
              <th>Cover</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Status</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
            @foreach($service_post as $post)
            <tr style="font-size:14px;">
              <td style="width:40px" class="text-center">{{ $loop->index + 1}}</td>
              <td  style="font-size:14px; width: 50px;" class="text-center">
                
              <div class="user-block text-center">
                
                <a href="{{ route('add_cover',[$service_name->description,$post->id]) }}">
                  <img src="{{ asset('image/cover/2021')}}/{{ $post->cover == '' ? 'default.png' : $post->cover }}" alt=""  style="border-radius: 4px;">
                </a>
                
              </div>

              </td>
              <td>{{ $post->tour_name }}</td>
              <td>Php {{ $post->price }}</td>
              <td>{{ $post->qty }}</td>
              <td>public</td>
              <td class="text-center">
                <div class="btn-group btn-group-sm">
                  <a href="{{ route('act_upload_photos',[$post->id,$service_name->description]) }}" class="btn btn-info">
                    Edit
                  </a>
                  <a href="#" class="btn btn-danger">
                    Delete
                  </a>
                </div>
              </td>
            </tr>
            @endforeach
        </thead>
        
        <tbody>
        </tbody>
        
        </table>
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
