@extends('layouts.app')
@section('content')

<section class="content">
      <div class="container-fluid">

<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header">
        <h3 class="card-title"><i class="nav-icon fa fa-bars" aria-hidden="true"></i> {{ $locations->names }} </h3>
      </div>

    <div class="card-body">

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">

    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data</a>

    <a class="nav-item nav-link" id="nav-building-tab" data-toggle="tab" href="#nav-building-facilities" role="tab" aria-controls="nav-building-facilities" aria-selected="false">Form</a>

  </div>
</nav>

<br>

<form name="search_country" method="GET" action="{{ route('search_country',$countries[0]->cid) }}">
  @csrf

<div class="input-group mb-3">
                  <input type="text" class="form-control" name="search" placeholder="Search Country">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-info">Search!</button>
                    <a href="{{ route('locations',$locations->id) }}" class="btn btn-info active">Refresh</a>
                  </span>
                </div>

</form>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


    
    <table class="table table-bordered table-sm table-hover">
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Country/State</th>
              <th>Region</th>
              <th>District</th>
              <th>City</th>
              <th>Municipality</th>
              <th>Barangay</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
        </thead>
<tbody>
    @forelse($countries as $country)
    <tr>
      <td>{{ $loop->index + 1 }}</td>
      <td>{{ $country->country }}</td>
      <td>null</td>
      <td>null</td>
      <td>null</td>
      <td>null</td>
      <td>null</td>
      <td class="text-center">
        <div class="uk-button-group">
          
        <a href="http://127.0.0.1:8000/admin/tourismo/ph/page/4/inclusion/14" class="btn btn-sm btn-primary py-0">Edit »</a>
        <a href="" onclick="if(confirm('Do you want to delete this country?'))event.preventDefault(); document.getElementById('delete-{{$country->cid}}').submit();" class="btn btn-sm btn-danger py-0">» Delete</a>
        <form id="delete-{{$country->cid}}" method="post" action="{{ route('delete_country',$country->cid) }}" style="display: none;">

      @csrf
      </form>
          </div>
      </td>
    </tr>
    @empty
    <p> No data  found!</p> 
    @endforelse
</tbody>

        <tbody>
        </tbody>
      </table>
  </div>
<div class="tab-pane fade" id="nav-building-facilities" role="tabpanel" aria-labelledby="nav-building-tab">    
<form role="form" method="post" action="{{ route('store_country_state',$locations->id) }}" id="form_valid">
@csrf
<div class="row">
<div class="col-sm-8">
<div class="form-group">
<label>Country/Region</label>
<input type="text" class="form-control" name="country" placeholder="Country/Region">
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

  </div>

</div>
    </div>
        
       <div class="card-footer clearfix">
      

        <ul class="pagination pagination-sm m-0 float-left">
            {{ $countries->links() }}
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</section>

@endsection
