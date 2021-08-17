@extends('layouts.merchant-app')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Profile</a></li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Company
                    <!-- <small class="float-right">Booked Date: {{ $data[0]->pm_created_at }}</small> -->
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <br>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <!-- From -->
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <!-- To -->
                  <address>
                    <strong>{{ $data[0]->lname }} {{ $data[0]->fname }} {{ $data[0]->mname }}.</strong><br>
                    {{ $data[0]->address }}<br>
                    {{ $data[0]->country }}<br>
                    Phone: {{ $data[0]->pnumber }}<br>
                    Email: {{ $data[0]->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Reference #007612</b><br>
                  <br>
                  <b>Booking ID:</b> {{ $data[0]->pm_id }}<br>
                  <b>Booked Date:</b> {{ $data[0]->pm_created_at }} <br>
                  <b>Booked Status:</b> {{ $data[0]->pm_payment_status }} <br>
                  <!-- <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <tbody>
                    <tr>
                      <th style="width:200px;">Package Name</th>
                      <td colspan="7">{{ $data[0]->tour_name}}</td>
                    </tr>
                    
                    <tr>
                      <th>Address</th>
                      <td colspan="7">{{ $data[0]->serviceid}}</td>
                    </tr>
                    <tr>
                      <th>Price</th>
                      <td>P {{ $data[0]->pm_book_amount}}</td>
                      <th>No. of night</th>
                      <td>{{ $data[0]->nonight}}</td>
                      <th>No. Guest</th>
                      <td>{{ $data[0]->noguest}}</td>
                      <th>Service name</th>
                      <td>{{ $data[0]->description}}</td>
                    </tr>
                    <tr>
                      <th>Inclusion</th>
                      <td colspan="7">{{ $data[0]->booking_package}}</td>
                    </tr>
                    <tr>
                      <th>About Package</th>
                      <td colspan="7">{{ $data[0]->tour_desc}}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p><!-- 
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                  <p class="text-muted well well-sm shadow-none text-center" style="margin-top: 10px;">
                    Throught TraxionPay
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:30%">Quantity:</th>
                        <td>
                          Price (₱{{ $data[0]->pm_book_amount }}) <b>x</b> Quantity ({{$data[0]->pm_book_qty}})
                        </td>
                        <td>
                          = <b>₱</b> {{ $quantity = $data[0]->pm_book_qty * $data[0]->pm_book_amount }}.00
                        </td>
                      </tr>
                      <tr>
                        <th>No. of Day's</th>
                        <td>
                          Price (₱{{ $data[0]->pm_book_amount }}) <b>x</b> Day ({{ $days }})<br>
                          <small class="text-muted">Free Nights {{ $data[0]->nonight }}</small>
                        </td>
                        <td>
                          = <b>₱</b> {{ $numberofdays = $data[0]->pm_book_amount * ($days-$data[0]->nonight) }}.00
                        </td>
                      </tr>
                      <tr style="font-size:20px;font-weight: 600">
                        <th>Total:</th>
                        <td>
                        </td>
                        <td>
                          &nbsp;&nbsp;&nbsp;<b>₱</b> {{ $quantity + $numberofdays }}.00
                        </td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
</section>

@endsection
