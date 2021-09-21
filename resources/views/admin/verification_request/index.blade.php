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
        <table class="table table-bordered table-sm">
        
        <thead>                  
            <tr>
              <th style="width: 10px">No. </th>
              <th>Merchant</th>
              <th>Contact No.</th>
              <th>E-mail</th>
              <th>Website</th>
              <th>Created</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($data as $list)
            <tr style="font-size: 14px;">
              <td class="text-center">{{ $loop->index + 1}}</td>
              <td>{{ $list->company }}</td>
              <td>{{ $list->telno }}</td>
              <td>{{ $list->email }}</td>
              <td>{{ $list->website }}</td>
              <td>{{ $list->created_at }}</td>
              <td>
                @if($list->id)
                   For Verification level
                @else
                   <span class="text-danger">For Compliance </span>
                @endif
              </td>
              
              <td class="text-center">
                <a class="btn btn-primary btn-xs" href="{{ route('merchant_verification_edit_view',$list->id)}}"><i class="fas fa-eye"></i> View</a> 
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
