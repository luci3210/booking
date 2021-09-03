@extends('layouts.app')

@section('content')

<section class="content">
      <div class="container-fluid">

<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-clipboard"></i> Posting Request</h3>
      </div>

    <div class="card-body">
        <table class="table table-bordered">
        
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Merchant</th>
              <th>Type</th>
              <th>Description</th>
              <th>Price</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posting as $list)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $list->company }}</td>
              <td>{{ $list->name }}</td>
              <td>{{ $list->tour_name }}</td>
              <td>₱{{ $list->price }}</td>
              <td>
                @if($list->ts == 2)
                  <span class="text-danger">Pending</span> 
                @elseif($list->ts == 3)
                  <span class="text-warning">For-Compliance</span> 
                @else
                  ?
                @endif
              </td>
              <td class="text-center">
                  
                  <div class="btn-group btn-group-sm">
                        <a href="{{ route('view_posting',[$list->serviceid,$url]) }}" class="btn btn-info"><i class="fas fa-eye"></i> Edit & Update</a>
                  </div>
              
              </td>
              
            @endforeach
        </tbody>

        </table>
    </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
