@extends('layouts.merchant-app')

@section('content')

<section class="content">
  <div class="container-fluid">


<div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Balance</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Last Withdraw</b> <a class="float-right">543</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Transaction</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

       
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Form Request</a></li>

                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Transaction</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                 
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Balance</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>







<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">
          Finance / <small>My Income</small>
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
