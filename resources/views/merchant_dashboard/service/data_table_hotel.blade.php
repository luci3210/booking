@extends('layouts.merchant-app')
@section('third_party_stylesheets')
<style>
    .breadcrumb {
    margin-bottom: 0;
    background-color:#6C3483;
    }
    .breadcrumb  .breadcrumb-item {
      color: #BB8FCE;
    }
    .breadcrumb a{
      color: #fff;
    }
    .breadcrumb a:hover {
     color: #BB8FCE; 
    }
</style>
@endsection
@section('content')

<section class="content">
  <div class="container-fluid">

  <div class="row">
    <div class="col-12">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-home"></i></a></li>
      <li class="breadcrumb-item"><a href="#">Post Service</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('m_create_post',$service_name->description) }}" class="py-0"><b>Create Post</b></a></li>
    </ol>
    </nav>
    </div>
  </div>

<div class="row">
  <div class="col-12">
    <div class="card mt-3">
    <div class="card-body">
        <table class="table table-bordered table-sm">
        <thead>                  
            <tr>
              <th>No.</th>
              <th>Cover</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Availability</th>
              <th>Status</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
            @forelse($data as $post)
            <tr style="font-size:14px;">
              <td style="width:40px" class="text-center">{{ $loop->index + 1}}</td>
              <td  style="font-size:14px; width: 50px;" class="text-center">
                
                <div class="user-block text-center">
                
                <a href="{{ route('add_cover',[$post->description,$post->id]) }}">
                  <img src="{{ asset('image/cover/2021')}}/{{ $post->cover == '' ? 'default.png' : $post->cover }}" alt=""  style="border-radius: 4px;">
                </a>
                
                </div>

              </td>
              <td>{{ $post->tour_name }}</td>
              <td>Php {{ $post->price }}</td>
              <td>
                INVT- {{ $post->qty }}<br>
                <small class="text-muted">AVAL- {{ $post->qty }}</small>
              </td>
              <td>
                Open Date
              </td>
              <td>
                  @if($post->temp_status == '2')
                    
                    For Approval

                  @elseif($post->temp_status == 3)

                    <span class="text-danger">For Compliance</span>

                  @else

                    <span class="text-success">Publish</span>

                  @endif
              </td>
              <td class="text-center">
              <div class="btn-group btn-group-sm mt-1">
                
                <a href="{{ route('m_act_upload_photos',[$post->id,$post->description]) }}" class="btn btn-outline-dark">
                  View
                </a>
                
                <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Edit 
                </button>



                <div class="dropdown-menu">
                <a class="dropdown-item small" href="{{ route('m_edit_hotel_content',[$post->description,$post->id]) }}">
                  Content
                </a>
                <a class="dropdown-item small" href="asas">
                  Photos
                </a>
                @if($post->cover_id == '')
                <a class="dropdown-item small" href="{{ route('m_act_upload_photos',[$post->id,$post->description]) }}">
                  Add Cover
                </a>
                @else
                <a class="dropdown-item small" href="{{ route('m_edit_cover_post',$post->cover_id) }}">
                  Cover
                </a>  
                @endif
                </div>

                <a href="#" onclick="if(confirm('Are you sure you want to delete this post?'))event.preventDefault(); document.getElementById('delete-{{ $post->id }}').submit();" class="btn btn-outline-dark">
                  Delete
                </a>

                

              </div>
              <form id="delete-{{$post->id}}" method="post" action="{{route('m_delete_post',$post->id )}}" style="display: none;">
                  @csrf
                </form>
            </td>
            </tr>
            @empty
            <tr>
            </tr>
            @endforelse
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
@section('merchantjs')

@endsection