@extends('layouts.app')

@section('content')

<section class="content">
      <div class="container-fluid">


<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title"><i class="nav-icon fa fa-get-pocket" aria-hidden="true"></i> Tourismo Package » <a href="{{ route('planpackage-create') }}" class="py-0">create</a></h3>
      </div>

    <div class="card-body">
        <table class="table table-bordered">
        
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Status</th>
              <th>Created</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
          @forelse($package as $packages)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $packages->package }}</td>
              <td>{{ $packages->status }}</td>
              <td>{{ $packages->created_at }}</td>
              <td class="text-center">
                <a href="{{ route('planpackage-edit',$packages->id) }}" class="btn btn-sm btn-primary py-0">Edit »</a>
                <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-{{$packages->id}}').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
                  <form id="delete-{{$packages->id}}" method="get" action="{{route('planpackage-delete',$packages->id)}}" style="display: none;">
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
        
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-left">
            {!! $package->links() !!}
        </ul>
        <!-- 
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul> -->
      </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
