@extends('layouts.merchant-app')

@section('content')

<section class="content">
  <div class="container-fluid">


<div class="row">
<div class="col-md-3">
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
  </div>
</div>

<div class="col-md-9">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Request Form</a></li>

        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Transaction</a></li>
      </ul>
    </div>

<div class="card-body">
<div class="tab-content">
  
  <div class="tab-pane active" id="settings">
    <form class="form-horizontal" action="{{ route('mch_withdraw_submit') }}" method="post">
    @csrf            
      <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">Balance</label>
        <div class="col-sm-9">
          <input type="text" class="form-control"  placeholder="Php {{ \App\Model\IncomeModel::sum('mi_tourismo_income') }}" readonly="readonly">
          <input type="hidden" name="balance" value="{{ \App\Model\IncomeModel::sum('mi_tourismo_income') }}" readonly="readonly">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">Amount</label>
        <div class="col-sm-9">
          <input type="text" name="amount" value="" class="form-control"  placeholder="Amount">
        </div>
      </div>
            
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Bank Name</label>
      <div class="col-sm-9">
        <select class="custom-select" name="bank_account">

          <option value="" disabled="true" selected="-Select country-">-Select Account-</option>
          @foreach($banklist as $mybank)
          <option value="{{ $mybank->id }}">{{ $mybank->bank }} - {{ $mybank->account_name }}</option>
          @endforeach

        </select>

    </div>
  </div>


            <div class="form-group row">
              <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
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
