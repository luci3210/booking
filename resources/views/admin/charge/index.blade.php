@extends('layouts.app')
@section('third_party_stylesheets')
<style type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"></style>
@endsection
@section('content')

 <div class="modal fade" id="charge_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="charge_name"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="companydata" method="post" action="{{ route('adm_update_charge') }}">
      @csrf

      <div class="modal-body">
        <input type="hidden" name="charge_id" id="charge_id" class="form-control">

        <div class="input-group mb-3">
          <input type="text" name="charge_value" id="charge_value" class="form-control">
          <div class="input-group-append">
            <span class="input-group-text"> % </span>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
      </div>

      </form>

    </div>
  </div>
</div>


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
        <h3 class="card-title">Manage Charges</h3>
      </div>

    <div class="card-body">
        <table class="table table-bordered" id="datatable">
        
        <thead>                  
            <tr>
              <th style="width: 25px">#</th>
              <th>Name</th>
              <th class="text-center">Charge</th>
              <th class="text-center">Status</th>
              <th style="width: 180px" class="text-center">Action</th>
            </tr>
        </thead>
        
        <tbody>
          @forelse($products as $product)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $product->name }}</td>
              <td class="text-center">
                @if($product->chrg_value >= 1)
                <span class="text-danger"> {{ $product->chrg_value }} % </span>
                @else
                {{ $product->chrg_value }} %
                @endif
              </td>
              <td class="text-center" style="text-transform: capitalize;">{{ $product->status }} </td>
                <td class="text-center">
<a href="#" class="btn btn-sm btn-primary" id="target_btn" data-toggle="modal" data-id="{{ $product->chrg_id }}">Update</a>
                </td>
            </tr>
          @empty
            <p> No listing found!</p> 
          @endforelse
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>

$(document).ready(function () {

// $.ajaxSetup({
//     headers: {
//             'X-CSRF-TOKEN': $('meta[name="{{ csrf_token() }}"]').attr('content')

//         }
// });

// $('body').on('click', '#submit', function (event) {
//     event.preventDefault()
//     var id = $("#color_id").val();
//     var name = $("#name").val();
   
//     $.ajax({
//       url: 'color/' + id,
//       type: "POST",
//       data: {
//         id: id,
//         name: name,
//       },
//       dataType: 'json',
//       success: function (data) {
          
//           $('#companydata').trigger("reset");
//           $('#practice_modal').modal('hide');
//           window.location.reload(true);
//       }
//   });
// });

$('body').on('click', '#target_btn', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    //console.log(id)
    $.get('color/' + id + '/edit', function (data) {
         $('#userCrudModal').html("Update");
         $('#submit').val("Update");
         $('#charge_id').val(data.data.chrg_id);
         $('#charge_value').val(data.data.chrg_value);
         $('#charge_name').text(data.data.name);
         $('#charge_modal').modal('show');
     })
});

}); 
</script>
@endsection