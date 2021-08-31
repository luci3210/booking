@extends('layouts.merchant-app')

@section('content')

<section class="content">
<div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          Complete booking
        </h3>
      </div>

<div class="card-body">
<table class="table table-bordered table-sm">
<thead>                  
    <tr  style="font-size:14px">
      <th>No.</th>
      <th>reference#</th>        
      <th>confimation#</th>   
      <th>Service Name / Description</th>     
      <th>Full Name</th>
      <th>Contact No.</th>
      <th>Booked Date</th>
      <th colspan="2">Booked Reserved</th>
      <th class="text-center">Action</th>
    </tr>
    @foreach($data as $post)
    <tr style="font-size:14px">
      <td class="text-center">{{ $loop->index + 1 }}</td>
      <td>{{ $post->ps_ref_no }}</td>
      <td>{{ str_pad($post->chg_id,11,'0', STR_PAD_LEFT) }}</td>
      <td><a href="">{{ $post->ps_description }}</a></td>
      <td>{{ $post->fname }} {{ $post->mname }}. {{ $post->lname }}  </a></td>
      <td>{{ $post->pnumber }}  </a></td>
      <td>{{ substr($post->pm_created_at,0,10) }}</td>
      <td>{{ substr($post->pm_book_date,0,10) }}</td>
      <td>{{ substr($post->pm_book_date_to,0,10) }}</td>
      <td class="text-center">
          <a href="#" class="text-primary" id="target_btn" data-toggle="modal" data-id="{{ $post->pm_id }}">  
            Details
          </a>
      </td>
    </tr>
    @endforeach
</thead>

<tbody>
</tbody>

</table>
</div>

    </div>
  </div>
</div>

</div>
</section>

@endsection

@section('third_party_scripts')

@endsection

