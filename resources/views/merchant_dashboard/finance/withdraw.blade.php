@extends('layouts.merchant-app')

@section('content')

<section class="content">
  <div class="container-fluid">


<div class="row">

<div class="col-md-12">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-pills"><a class="nav-link active" href="#settings" data-toggle="tab">Request Form</a></li>
        <li class="nav-pills"><a class="nav-link" href="#trasaction" data-toggle="tab">Transaction</a></li>
      </ul>
    </div>

<div class="card-body">

<div class="row invoice col-12 p-3 mb-3">

  <div class="col-sm-3 invoice-col mt-3">  

              <div class="card bg-light">
                
                <div class="card-header text-muted border-bottom-0">
                  Total Income
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="lead"><b>Php {{ number_format($income_total_balance,2) }}</b></h2>
                      
                    </div>
                  </div>
                </div>

                <div class="card-header text-muted border-bottom-0">
                  Balance
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="lead"><b>Php {{ number_format($new_balance,2) }}</b></h2>
                      
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-calendar-week"></i> Details
                    </a>
                  </div>
                </div>
              </div>

  </div>

  <div class="col-sm-9 invoice-col p-3 mb-1">  
 

<div class="tab-content">

<!-- ----------------------------- form request ------------------------------------ -->

<div class="tab-pane active" id="settings">
<form class="form-horizontal" action="{{ route('mch_withdraw_submit') }}" method="post">
@csrf            
<div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">Balance</label>
  <div class="col-sm-10">
    <input type="text" class="form-control"  placeholder="Php {{ number_format($new_balance,2) }}" readonly="readonly">
    <input type="hidden" name="balance" value="Php {{ number_format($new_balance,2) }}" readonly="readonly">
  </div>
</div>

<div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">Amount</label>
  <div class="col-sm-10">
    <input type="text" name="amount" value="" class="form-control"  placeholder="Amount">
    <small class="text-danger has-error">
{{ $errors->has('amount') ?  $errors->first('amount') : '' }}
</small>
  </div>
</div>
      
<div class="form-group row">
<label class="col-sm-2 col-form-label">Bank Name</label>
<div class="col-sm-10">
  <select class="custom-select" name="bank_account">
    <option value="" disabled="true" selected="-Select country-">-Select Account-</option>
    @foreach($banklist as $mybank)
    <option value="{{ $mybank->ba_id }}">{{ $mybank->bank }} - {{ $mybank->account_name }}</option>
    @endforeach
  </select>
  <small class="text-danger has-error">
    {{ $errors->has('bank_account') ?  $errors->first('bank_account') : '' }}
  </small>

</div>
</div>


      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> Submit</button>
        </div>
      </div>
    </form>
  </div>

<!-- ----------------------------- end form ------------------------------------ -->



<!-- ----------------------------- transaction list ---------------------------- -->

<div class="tab-pane" id="trasaction">

<table class="table table-bordered">
    <tr>
      <th>Reference#</th>
      <th>Amount</th>
      <th>Bank Account</th>
      <th>Status</th>
    </tr>
  <tbody>
    @if(count($transaction) > 0)
    @foreach($transaction as $list)
    <tr>
      <td><a href="#">WDR{{ str_pad($list->iw_id,9,'0', STR_PAD_LEFT) }}</a></td>
      <td>Php {{ $list->iw_withdraw_amount }}</td>
      <td>{{ $list->account_name }}
        <br>
        <small class="text-muted">****{{ substr($list->account_number,-4) }}</small>
      </td>
      <td>
        @if($list->status == 'Pending')
          {{ $list->status }}
        @else
          {{ $list->status }}
        <br>
        <small class="text-muted">Receipt#.{{ $list->iw_reference_no }}</small>
        @endif
      </td>
    </tr>
    @endforeach
    @else
    <tr class="text-center">
      <td colspan="4"> No Trasaction found.</td>
    </tr>
    @endif
  </tbody>
</table>

</div>

<!-- -------------------------------------- end transaction ---------------------------- -->
</div>

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
