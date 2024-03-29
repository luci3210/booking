@extends('layouts.merchant-app')

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
        <h3 class="card-title">
          <i class="fas fa-box-open"></i> Income
        </h3>
      </div>

    <div class="card-body">

        <table class="table table-bordered">
        <thead>                  
            <tr>
              <th>This week</th>
              <th>This month</th>
              <th>total</th>
              <th colspan="2"  class="text-center">Action</th>
            </tr>
            @if($incomeData)
            <tr>
              <td>{{ number_format($incomeData['weeklyData'],2) }}</td>
              <td>{{ number_format($incomeData['monthlyData'],2) }}</td>
              <td>{{ number_format($incomeData['totalData'],2) }}</td>
              <td class="text-center">
                <div class="btn-group btn-group-sm">
                  <a href="" class="btn btn-info"><i class="fas fa-eye"></i> view</a>
                  <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                </div>
              </td>
            </tr>
            @endif
        </thead>
        
        <tbody>
        </tbody>
        
        </table>


<!---------------select date--------------->

<div class="row justify-content-end mt-4">
    
    <div class="col-3 text-right">
      <div class="input-group">
      <div class="input-group-prepend">
      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
      </div>
      <input type="text" class="form-control form-control-sm" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" placeholder="dd/mm/yyyy">
      </div>
    </div>

    <div class="col-3 text-right">
      <div class="input-group">
      <div class="input-group-prepend">
      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
      </div>
      <input type="text" class="form-control form-control-sm" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" placeholder="dd/mm/yyyy">
      </div>
    </div>

    <div class="col-2 text-right">
      <button type="button" class="btn btn-primary btn-block btn-sm">Load Data</button>
    </div>

  </div>

<!-----------------end select date---------------->

<!----------------- table search result end --------------------->

<table class="table table-hover table-sm mt-4">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Reference</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Method</th>
      <th scope="col">Income</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>

<!----------------- table search result end --------------------->






    </div>
        
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-left">
        </ul>
      </div>

    </div>
  </div>
</div>

</div>
</section>

@endsection
@section('merchantjs')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js" integrity="sha512-6Jym48dWwVjfmvB0Hu3/4jn4TODd6uvkxdi9GNbBHwZ4nGcRxJUCaTkL3pVY6XUQABqFo3T58EMXFQztbjvAFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
  $('input').inputmask();
</script>
@endsection
