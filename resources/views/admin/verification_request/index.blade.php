@extends('layouts.app')

@section('content')

<section class="content">
      <div class="container-fluid">

<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-check"></i> Merchant Verification Request</h3>
      </div>

    <div class="card-body">
        <table class="table table-bordered">
        
        <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Merchant</th>
              <th>Verify Date</th>
              <th>Plan Type</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($profile as $list)
            <tr>
              <td>1.</td>
              <td>{{ $list->company }}</td>
              <td>{{ $list->request_at }}</td>
              <td>{{ $list->plan_name }} - {{ $list->validity }}</td>

              <td>
                @if($list->id1 == 1)
                   For Verification level
                @elseif($list->id1 == 2)
                   <span class="text-danger">For Compliance </span>
                @else 
                   Wrong status
                @endif
              </td>
              
              <td class="text-center">
                <a class="btn btn-primary btn-xs" href="{{ route('merchant_verification_edit_view',$list->planid)}}"><i class="fas fa-eye"></i> View</a> 
              </td>
            </tr>
            @endforeach
        </tbody>
        
        </table>
    </div>
        
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
      </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
