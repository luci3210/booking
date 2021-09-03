@extends('layouts.app')

@section('content')

<section class="content">
      <div class="container-fluid">


<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title"><i class="nav-icon fa fa-get-pocket" aria-hidden="true"></i> Plan » <a href="{{ route('plan-create') }}" class="py-0">create</a></h3>
      </div>

    <div class="card-body">
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
          @forelse($plan as $plans)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $plans->plan_name }}</td>
              <td>{{ $plans->plan_price }}</td>
              <td>{{ $plans->plan_scope }}</td>
              <td>{{ $plans->plan_package }}</td>
              <td>{{ $plans->status }}</td>
              <td>{{ $plans->created_at }}</td>
              <td class="text-center">
                <a href="{{ route('plan-edit',$plans->id) }}" class="btn btn-sm btn-primary py-0">Edit »</a>
                <a href="" onclick="if(confirm('Are sure, you want to delete this plan?'))event.preventDefault(); document.getElementById('delete-{{$plans->id}}').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
                  <form id="delete-{{$plans->id}}" method="get" action="{{route('plan-delete',$plans->id)}}" style="display: none;">
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
            {!! $plan->links() !!}
        </ul>
      </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
