@extends('layouts.tourismo.ui_mobile')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<style>
    #main {
        margin-top: -10px!important;
    }
    .mobile-nav-icon{
      display: none!important;
    }
    .list-group-item.active{
        color:white!important;
        background-color: #4e2671!important;
        border: solid 1px #4e2671 !important;
    }
    .form-group,label{
        font-size:.8rem
    }
    .datepicker{
        width: 100%;
        text-align: center;
        cursor: pointer;
    }
</style>
@section('content')


<section class="container">
    <div class="row">
        <div class="col-12 my-1">
            <div class="card-header">
                <h3 class="card-title">Booking Details | {{ $byname[0]->name }} » {{ $byname[0]->country }} » {{ $byname[0]->district }}</h3>
            </div>
            <p class="text-muted my-1">
                Name : <span id="billing_service_name">{{ $byname[0]->tour_name }}</span>
            </p>
        </div>
        <div class="col-12 my-2">
            <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-info" data-bs-toggle="list" href="#info" role="tab" aria-controls="info">Info</a>
            <a class="list-group-item list-group-item-action " id="list-book-list" data-bs-toggle="list" href="#book" role="tab" aria-controls="book">Book</a>
            <a class="list-group-item list-group-item-action " id="list-details-list" data-bs-toggle="list" href="#details" role="tab" aria-controls="details">Details</a>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-12 my-2">
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="list-home-list">
                <div class="row g-1" id="form-info">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="text-truncate">First Name</label>
                            <input type="text" class="form-control" name="billing_first_name" id="billing_first_name" value="{{ Auth::user()->fname }}" readonly="readonly">
                            <input type="hidden" name="billing_tour_name" value="{{ $byname[0]->tour_name }}">
                            <input type="hidden" name="billing_tour_id" value="{{ $byname[0]->st_id }}">
                            <input type="hidden" name="billing_price" value="{{ $byname[0]->price }}">
                        </div>
                    <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="form-group">
                        <label class="text-truncate">Last Name</label>
                        <input type="text" class="form-control" name="billing_last_name" id="billing_last_name" value="{{ Auth::user()->lname }}" readonly="readonly">
                        </div>
                    <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="form-group">
                        <label class="text-truncate">M. Name</label>
                        <input type="text" class="form-control" name="billing_middle_name" id="billing_middle_name" value="{{ Auth::user()->mname }}" readonly="readonly">
                        </div>
                        <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="billing_country" id="billing_country" value="" readonly="readonly">
                        </div>
                        <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <div class="form-group">
                        <label class="text-truncate">Email</label>
                        <input type="text" class="form-control" name="billing_email" id="billing_email" value="{{ Auth::user()->email }}" readonly="readonly">
                        </div>
                        <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-2">
                         <div class="form-group">
                        <label>code</label>
                        <input type="text" class="form-control" name="billing_country" id="billing_country" value="+63" readonly="readonly">
                        </div>
                        <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-10">
                         <div class="form-group">
                         <label class="text-truncate">Phone #</label>
                        <input type="text" class="form-control" name="billing_phone" id="billing_phone" value="{{ Auth::user()->pnumber }}" readonly="readonly">
                        </div>
                        <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="billing_address_1" id="billing_address_1" value="{{ Auth::user()->address }}" readonly="readonly">
                        </div>
                        <!--form group  -->
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row form -->
                
            </div>
            <!-- panel  Info-->
            <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="list-reviews-list">
                <div class="row g-1" id="books">
                    <div class="col-4" >
                        <div class="form-group">
                            <label class="text-truncate">Quantity</label>
                            <input type="text" class="form-control" name="qty" id="quantity"  onchange="getQty(event)" value="1" min="1">
                        </div> 
                        <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-4" style="margin-bottom: 12px;">
                        <div class="form-group">
                            <label class="text-truncate">Adult</label>
                            <input type="text" class="form-control" name="adult" id="adult"   value="1" min="1">
                        </div> 
                        <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="form-group">
                            <label class="text-truncate">Children</label>
                            <input type="text" class="form-control" name="children" id="children"  value="0" min="0">
                        </div> 
                        <!--form group  -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" class="form-control float-right datepicker" name="datetimes" >
                        </div> 
                        <!--form group  -->
                    </div>
                    <!-- /.col -->


                </div>
                <!-- row books -->
            </div>
            <!-- panel  Book-->
            <div class="tab-pane fade " id="details" role="tabpanel" aria-labelledby="list-details-list">
                <div style="height:50px;width:100%; background-color:#f4f4f4; padding: 10px 10px 10px;">
                    <p  style="font-size:1.2rem;font-weight:700;color:#f7442e">Amount - ₱ {{ number_format($byname[0]->price,2) }}</p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Quantity </th>
                                <td ><h6 id="qty-count" class="mb-0 f-bold">Qty x Price</h6></td>
                                <td id="qty-fee">result</td>
                            </tr>
                            <tr>
                                <th>No. of days</th>
                                <td ><h6 id="days-count" class="mb-0 f-bold">Days x Price</h6><small class="text-muted">free nights {{$byname[0]->nonight}}</small></td>
                                <td id="days-fee">result</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td></td>
                                <td><b><p><span id="billing_total_payment">0</span></p></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.tb res -->
            </div>
            <!-- panel  Book-->

            </div>
            <!-- ./row -->

        </div>
        <!-- /.col -->
        
        <div class="col-12 form-group mt-3 ">
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid ">
                <label><input class="uk-radio" type="radio" name="payment-method" value="paypal" checked> Pay with PayPal</label>
                <label><input class="uk-radio" type="radio" name="payment-method" value="traxion" checked> Pay with TraxionPay</label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-12">
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-success float-left" onClick="checkPaymentMethod()">
                    <i class="far fa-credit-card"></i> Continue 
                </button>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.section main div -->





@endsection

@section('js')

<script src="{{ asset('public/vendor/bootstrap/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('public/vendor/bootstrap/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/vendor/bootstrap/js/moment.min.js') }}"></script>
<script src="{{ asset('public/vendor/bootstrap/js/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('public/vendor/bootstrap/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script type="text/javascript">
  $(function () {
      //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    })

</script>


<script type="text/javascript">

  let fromDate = '';
  let toDate = '';
  let qtyCount = 1;
  let qtyTotalCountFee = 0;
  let totalAdultCount = 1;
  let totalAdultFee = parseFloat('{{$byname[0]->price}}' );
  let totalAdultValue = 0;
  let totalChildrenCount = 0;
  let totalChildrenFee = parseFloat('{{$byname[0]->price}}');
  let totalChildrenValue = 0;
  let totalFee = parseFloat('{{$byname[0]->price}}');
  let totalOfDays = parseInt('{{$byname[0]->nonight}}');
  let totalOfDaysFee = 0;
  let checkAvailblity = true;
  let tripFee = parseFloat('{{$byname[0]->price}}');
  let tripFeess = '{{$byname[0]->price}}';
  let additionalFee = 0;
  let nightsLimit = parseInt('{{$byname[0]->nonight}}');
  $('#billing_total_payment').text(tripFee.toLocaleString(undefined, {minimumFractionDigits: 2}))


  $('input[name="datetimes"]').daterangepicker({
    timePicker: true,
    minDate: "{{--$curDate2--}}",
  
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'M/DD hh:mm A'
    }
  });

  $('input[name="datetimes"]').on('apply.daterangepicker', function(ev, picker) {
    fromDate = picker.startDate.format('YYYY-MM-DD hh:mm:ss')
    toDate = picker.endDate.format('YYYY-MM-DD hh:mm:ss')
    var a = new Date (picker.startDate.format('MM-DD-YYYY'))
    var b = new Date (picker.endDate.format('MM-DD-YYYY'))
    var limit = parseInt('{{$byname[0]->nonight}}')
    var timeDiff = 0
    if (b) {
        const diffTime = Math.abs(b - a);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

        totalOfDays = diffDays
        var price = '{{$byname[0]->price}}';
        if(totalOfDays > limit){
          var exceedDays = totalOfDays - limit
          totalOfDaysFee = exceedDays * price


        }else{
          totalOfDaysFee = 0
        }
        console.log(diffDays,'days',totalOfDaysFee,'additional');
        checkBook()
    }

    console.log(picker.startDate.format('YYYY-MM-DD hh:mm:ss'));
    console.log(picker.endDate.format('YYYY-MM-DD hh:mm:ss'));
  });
  

  function checkBook(){
    const children = $('input[name="children"]').val();
    const adult = $('input[name="adult"]').val();
    const totalGuest = parseInt(adult) + parseInt(children)
    const qtyFee =   qtyCount > 1 ? tripFee * qtyCount : tripFee
    const diffGuest = 0 
    const totals =  parseFloat(totalOfDaysFee + qtyFee)
    totalFee  =  totals > tripFee ?  totals : tripFee
    var displayFee  =  totals > tripFee ?  totals.toLocaleString(undefined, {minimumFractionDigits: 2}) : tripFee.toLocaleString(undefined, {minimumFractionDigits: 2})
    $('#billing_total_payment').text(displayFee)
    $('#qty-fee').text(qtyFee.toLocaleString(undefined, {minimumFractionDigits: 2}))
    $('#days-fee').text(totalOfDaysFee.toLocaleString(undefined, {minimumFractionDigits: 2}))
    $('#days-count').text(`${parseInt(totalOfDays)} Days x ${tripFee.toLocaleString(undefined, {minimumFractionDigits: 2})} Price `)
    $('#qty-count').text(`${parseInt(qtyCount)} Qty x ${tripFee.toLocaleString(undefined, {minimumFractionDigits: 2})} Price `)
    console.log(`totals ${totals} tripFee ${tripFee} totals${totalFee}`)
    
  }


  function getQty(event){
    const value = event.target.value
    qtyCount = value;
    checkBook()

  }

  function checkPaymentMethod(){
    let paymentType= $('input[name="payment-method"]:checked').val();
    checkBook()

    if(paymentType == 'traxion'){
        paybyTraxion();
        return;
    }
    if(paymentType == 'paypal'){
      alert(paymentType)
      return;
    }
    if(paymentType == null){
      alert('please select payment type...')
    }
  }



  function paybyTraxion(){
    const bookdate     = fromDate;
    const bookdateto   = toDate;
    const fname        = $('input[name="billing_first_name"]').val();
    const lname        = $('input[name="billing_last_name"]').val();
    const qty          = $('input[name="qty"]').val();
    const company      = $('input[name="billing_company"]').val();
    const middlename   = $('input[name="billing_middle_name"]').val();
    const children     = $('input[name="children"]').val();
    const adult        = $('input[name="adult"]').val();
    const city         = $('input[name="billing_city"]').val();
    const country      = $('input[name="billing_country"]').val();
    const address_1    = $('input[name="billing_address_1"]').val();
    const state        = $('input[name="billing_state"]').val();
    const postcode     = $('input[name="billing_postcode"]').val();
    const phone        = $('input[name="billing_phone"]').val();
    const email        = $('input[name="billing_email"]').val();
    const plan_price   = $('#plan_price_checkout').val();
    const plan_name    = $('#billing_service_name').text();
    if(bookdate == null || bookdate.length <= 0 || bookdate == undefined){
      swal({
        text: "Select a book date",
        icon:"error"
      });
      return;
    }

    if(qty == null || qty <= 0 || qty == undefined){
      swal({
        text: "Quantity cant be zero",
        icon:"error"
      });
      return;
    }
    if(children ==  null || adult == null || adult <=0){
      swal({
        text: "Add your adult and children count",
        icon:"error"
      });
      return;
    }

    var datam = {
        billing_first_name: fname,
        billing_last_name: lname,
        billing_middle_name: middlename,
        billing_email: email,
        billing_company: company,
        billing_city: city,
        billing_country: country,
        billing_address_1: address_1,
        billing_state: state,
        billing_postcode: postcode,
        billing_phone: phone,
        billing_email: email,
        // billing_price: plan_price,
        billing_price: totalFee,
        billing_plan_name: plan_name,
        book_date_from:bookdate,
        book_date_to:bookdateto,
        children_count:parseInt(children),
        adult_count:parseInt(adult),
        book_qty:qty,
        desc:`{{$byname[0]->tour_desc}}`,
        expect:`{{$byname[0]->tour_expect}}`,
        noguest:'{{$byname[0]->noguest}}',
        proid:'{{$byname[0]->proid}}',
        uid: '{{$byname[0]->st_id}}',
        url_callback:'{{route('checkout_callback')}}',
        myurl:'https://booking.tourismo.ph/checkout/status',
        myid:'{{ Auth::user()->id }}'
        
    };
    console.log(datam);
    window.localStorage.setItem('bookData',JSON.stringify(datam));

    var crfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
      url: '{{ route('generate_link') }}',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
        '_token': '{{ Session::token()  }}',
        'Authorization': '{{ Session::token()  }}',
      },
      method:"post",
      data:datam,
      success: function(data)
      {
        console.log(data);
        let paymenyLink = data['dataresp']['form_link']
        window.open(paymenyLink);
        console.log(paymenyLink);
        swal({
          text: "Booked success",
          icon:"success"
        });
      },
      fail:function(jqXHR) {
        console.log( "Request failed: xxxx" + jqXHR );
      },
      error:function(data){
        swal({
        text: `${data.responseText}`,
        icon:"error"
      });
      }
    });
    $.ajax();
  }
    
</script>

@endsection