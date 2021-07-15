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
        <h3 class="card-title">Manage Bank</h3>
      </div>

  <div class="card-body">

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


<form role="form" method="post" action="{{ route('bank_update',[$bank->id,$url]) }}" id="form_valid">
@csrf
<div class="row">
<div class="col-sm-8">
<div class="form-group">
<label>
  Bank Name
  <small class="text-danger has-error">{{ $errors->has('bank') ?  $errors->first('bank') : '' }}</small>
</label>
<input type="text" class="form-control" name="bank" value="{{ old('bank',$bank->bank) }}" placeholder="Bank Name">
</div>
</div>
    
<div class="col-sm-4">
<div class="form-group">
<label>
  Status
  <small class="text-danger has-error">{{ $errors->has('status') ?  $errors->first('status') : '' }}</small>
</label>
<select class="form-control" name="status">
  <option value="1"  {{ $bank->id == 1 ? ' selected="selected"' : '' }}>Active</option>
  <option value="2"  {{ $bank->id == 2 ? ' selected="selected"' : '' }}>Inactive</option>
</select>
</div>
</div>
</div>
<button type="submit" class="btn btn-warning float-left">Update</button>
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
          @foreach($bank_list as $list)
          <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $list->bank }}</td>
              <td>{{ $list->tstatus }}</td>
              <td class="text-center">
                <a href="{{ route('bank_edit',[$list->bid,$url]) }}" class="btn btn-sm btn-primary py-0">Edit »</a>
                <a href="" onclick="if(confirm('Do you want to delete this product?'))event.preventDefault(); document.getElementById('delete-{{$list->bid}}').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
                  <form id="delete-{{$list->bid}}" method="post" action="{{ route('bank_deleted',$list->bid) }}" style="display: none;">
                  @csrf             
                  </form>
              </td>
          </tr>
          @endforeach
                     
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
