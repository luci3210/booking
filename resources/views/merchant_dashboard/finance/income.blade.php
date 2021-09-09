@extends('layouts.merchant-app')

@section('content')

<section class="content">
  <div class="container-fluid">

<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          Finance / My Income / <small>withdraw</small>
        </h3>
      </div>

    <div class="card-body">

        <table class="table table-bordered">
        <thead>                  
            <tr>
              <th>This Day</th>
              <th>This Month</th>
              <th>Total</th>
              <th colspan="2" class="text-center">Balance</th>
            </tr>
            <tr>
              <td>
                Php {{ $thisday }}
              </td>
              <td>
                Php {{ $thismonth }}
              </td>
              <td>
                Php {{ $thismonth }}
              </td>
              <td>
                Php {{ $thismonth }}
              </td>
              <td class="text-center">
                <a href="{{ route('mch_withdraw') }}" class="text-muted">Withdraw</a>
              </td>
            </tr>
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
