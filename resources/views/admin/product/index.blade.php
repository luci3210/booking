@extends('layouts.app')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
        
            <div class="small-box bg-info">
              <div class="inner">
                <h4>150</h4>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h4>53<sup style="font-size: 20px">%</sup></h4>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>44</h4>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>65</h4>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        




<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title"><i class="nav-icon fa fa-product-hunt" aria-hidden="true"></i> Tourismo Product » <a href="{{ route('product-create') }}" class="py-0">create</a></h3>
      </div>

    <div class="card-body">
        <table class="table table-bordered">
        
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Status</th>
              <th>Created</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
          @forelse($products as $product)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->description }}</td>
              <td>{{ $product->status }}</td>
              <td>{{ $product->created_at }}</td>
              <td class="text-center">
                <a href="{{ route('product-store-edit',$product->id) }}" class="btn btn-sm btn-primary py-0">Edit »</a>
                <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-{{$product->id}}').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
                  <form id="delete-{{$product->id}}" method="get" action="{{route('product-store-delete',$product->id)}}" style="display: none;">
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
            {!! $products->links() !!}
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
