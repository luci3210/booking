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
        <h3 class="card-title"><i class="nav-icon fa fa-product-hunt" aria-hidden="true"></i> Inclusion for {{ $product->name }} </h3>
      </div>

    <div class="card-body">

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Room Facilities</a>

    <a class="nav-item nav-link" id="nav-building-tab" data-toggle="tab" href="#nav-building-facilities" role="tab" aria-controls="nav-building-facilities" aria-selected="false">Building Facilities</a>

    <a class="nav-item nav-link" id="nav-package-tab" data-toggle="tab" href="#nav-package" role="tab" aria-controls="nav-package" aria-selected="false">Package</a>
  </div>
</nav><br>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


<form role="form" method="post" action="{{ route('facilities_save') }}" id="form_valid">
@csrf
<div class="row">
<div class="col-sm-8">
<div class="form-group">
<label>Name / Short Desc</label>
<input type="text" class="form-control" name="facilities" placeholder="Facilities Name">
</div>
</div>
    
<div class="col-sm-4">
<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
  <option value="1">Active</option>
  <option value="2">Inactive</option>
</select>
</div>
</div>
</div>
<button type="submit" class="btn btn-info float-right">Save</button>
<br>
<br>
<br>

</form>
    
    <table class="table table-bordered">
        
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Status</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
           @forelse($roomfacilities as $facilities)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $facilities->name }}</td>
              <td>{{ $facilities->status }}</td>
              <td class="text-center">
                <a href="{{ route('inclusion',$facilities->id) }}" class="btn btn-sm btn-primary py-0">Edit »</a>
                <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-{{$facilities->id}}').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
                  <form id="delete-{{$facilities->id}}" method="get" action="{{route('product-store-delete',$facilities->id)}}" style="display: none;">
                  @csrf
                </form>
              </td>
            </tr>
          @empty
            <p class="text-center"><b> No data found!</b></p> 
          @endforelse
        </tbody>
        
        </table>

  </div>



  <div class="tab-pane fade" id="nav-building-facilities" role="tabpanel" aria-labelledby="nav-building-tab">
    
<form role="form" method="post" action="{{ route('builfaci_save') }}" id="form_valid">
@csrf
<div class="row">
<div class="col-sm-8">
<div class="form-group">
<label>Name / Short Desc</label>
<input type="text" class="form-control" name="facilities" placeholder="Facilities Name">
</div>
</div>
    
<div class="col-sm-4">
<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
  <option value="1">Active</option>
  <option value="2">Inactive</option>
</select>
</div>
</div>
</div>
<button type="submit" class="btn btn-info float-right">Save</button>
<br>
<br>
<br>

</form>
    <table class="table table-bordered">
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Status</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
           @forelse($buildingfacilities as $facilities)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $facilities->name }}</td>
              <td>{{ $facilities->status }}</td>
              <td class="text-center">
                <a href="{{ route('inclusion',$facilities->id) }}" class="btn btn-sm btn-primary py-0">Edit »</a>
                <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-{{$facilities->id}}').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
                  <form id="delete-{{$facilities->id}}" method="get" action="{{route('product-store-delete',$facilities->id)}}" style="display: none;">
                  @csrf
                </form>
              </td>
            </tr>
          @empty
            <p class="text-center"><b> No data found!</b></p> 
          @endforelse
        </tbody>
        
        </table>

  </div>

  <!-- package -->
  <div class="tab-pane fade" id="nav-package" role="tabpanel" aria-labelledby="nav-package-tab">
    <form role="form" method="post" action="{{ route('package_save') }}" id="form_valid">
@csrf
<div class="row">
<div class="col-sm-8">
<div class="form-group">
<label>Name / Short Desc</label>
<input type="text" class="form-control" name="facilities" placeholder="Facilities Name">
</div>
</div>
    
<div class="col-sm-4">
<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
  <option value="1">Active</option>
  <option value="2">Inactive</option>
</select>
</div>
</div>
</div>
<button type="submit" class="btn btn-info float-right">Save</button>
<br>
<br>
<br>

</form>
    <table class="table table-bordered">
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Status</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
           @forelse($package as $facilities)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $facilities->name }}</td>
              <td>{{ $facilities->status }}</td>
              <td class="text-center">
                <a href="{{ route('inclusion',$facilities->id) }}" class="btn btn-sm btn-primary py-0">Edit »</a>
                <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-{{$facilities->id}}').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
                  <form id="delete-{{$facilities->id}}" method="get" action="{{route('product-store-delete',$facilities->id)}}" style="display: none;">
                  @csrf
                </form>
              </td>
            </tr>
          @empty
            <p class="text-center"><b> No data found!</b></p> 
          @endforelse
        </tbody>
        
        </table>
  </div>
</div>




    </div>
        
      <div class="card-footer clearfix">
      

        <ul class="pagination pagination-sm m-0 float-left">
            {!! $roomfacilities->links() !!}
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
