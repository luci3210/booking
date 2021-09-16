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
        <table class="table table-bordered">
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Pic</th>
              <th>Name</th>
              <th>Price</th>
              <th>#Night</th>
              <th>#Guest</th>
              <th>Qty</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
            @foreach($service_post as $post)
            <tr>
              <td style="width: 10px">#</td>
              <td>
                
              <div class="user-block">
                <a href="{{ route('add_cover',[$service_name->description,$post->id]) }}">Create Cover</a>
                <img class="img-circle img-bordered-sm" src="https://www.hotelnewsnow.com/Media/Default/Images2016/Locations/Westin-Wilmington-Front.jpg" alt="user image">
                
              </div>

              </td>
              <td>{{ $post->tour_name }}</td>
              <td>{{ $post->price }}</td>
              <td>{{ $post->nonight }}</td>
              <td>{{ $post->noguest }}</td>
              <td>{{ $post->qty }}</td>
              <td class="text-center">
                      <div class="btn-group btn-group-sm">
                        <a href="{{ route('act_upload_photos',[$post->id,$service_name->description]) }}" class="btn btn-info"><i class="fas fa-eye"></i> Edit</a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
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
