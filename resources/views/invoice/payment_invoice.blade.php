<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
    .page-break {
        page-break-after: always;
    }
    .bg-grey {
        background: #F3F3F3;
    }
    .text-right {
        text-align: right;
    }
    /* .w-full {
        width: 100%;
    }
    .small-width {
        width: 15%;
    } */
    .invoice {
        background: white;
        border: 1px solid #CCC;
        font-size: 14px;
        padding: 48px;
        margin: 20px 0;
    }
    </style>
</head>
<body class="bg-grey">

<div class=" ">
<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="invoice">
        <div class="row">
            <div class="col-sm-6">
            <h4>From:</h4>
            <address>
                <strong>Company Inc.</strong><br>
                123 Company Ave. <br>
                Toronto, Ontario - L2R 4U6<br>
                P: (416) 123 - 4567 <br>
                E: company@company.com
            </address>
            </div>

            <div class="col-sm-6 text-right">
            <img src="https://testruntourismoph.wanderlustmusicfestival.com/public/image/logo/logoab.png" alt="logo">
            </div>
        </div>

        <div class="row">

            <div class="col-sm-7">
            <h4>To:</h4>
            <address>
                <strong>{{$extra['user_fname']}} {{$extra['user_lname']}}</strong><br>
                <span>123 Cool St.</span><br>
                <span>{{$extra['user_email']}}</span>
            </address>
            </div>

            <div class="col-sm-5 text-right">
            <table class="w-full">
                <tbody>
                <tr>
                    <th>Invoice Num:</th>
                    <td>{{$stausPayment['ref_no']}}</td>
                </tr>
                <tr>
                    <th> Invoice Date: </th>
                    <td>Jun 24, 2019</td>
                </tr>
                </tbody>
            </table>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <table class="w-full">
                <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 5px"><div> Payment Thru ({{$stausPayment['payment_method']}}) </div></th>
                    <td style="padding: 5px"><strong> $499 </strong></td>
                </tr>
                </tbody>
            </table>


            </div>
        </div>

        <div class="table-responsive">
            <table class="table invoice-table">
            <thead style="background: #F5F5F5;">
                <tr>
                <th>Item List</th>
                <th></th>
                <th class="text-right">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    <strong>{{$stausPayment['description']}}</strong>
                </td>
                <td></td>
                <td class="text-right">$600</td>
                </tr>

                <tr>
                <td>
                    <strong>Service</strong>
                    <p>Description here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita perferendis doloribus, quaerat molestias est eum, adipisci dolorem nulla rerum voluptatibus.</p>
                </td>
                <td></td>
                <td class="text-right">$600</td>
                </tr>

                </tbody>
            </table>
            </div><!-- /table-responsive -->

            <table class="table invoice-total">
            <tbody>
                <tr>
                <td class="text-right"><strong>Total:</strong></td>
                <td class="text-right small-width">$600</td>
                </tr>
            </tbody>
            </table>

            <hr>

            <div class="row">
            <div class="col-lg-8">
                <div class="invbody-terms">
                Thank you for your business. <br>
                <br>
                <h4>Payment Terms and Methods</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium cumque neque velit tenetur pariatur perspiciatis dignissimos corporis laborum doloribus, inventore.
                </p>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>

</body>
</html>