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
    .bg-main {
        background-image:url('{{asset("image/logo/logoa.png")}}');
        background-repeat: no-repeat;
        background-size: contain;
        background-position:center center ;
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
        background: #ffffffa6;
        border: 1px solid #CCC;
        font-size: 14px;
        padding: 48px;
        margin: 20px 0;
    }
    </style>
</head>
<body class="bg-main">

<div class=" ">
<div class="row">
    <div class="col-lg-12 ">
        <div class="invoice">
        <div class="row">
            <div class="col-sm-4">
            <h4>From:</h4>
            <address>
                <strong>test company</strong><br>
                Address: P.O. Box 1201, Manila Central Post Office 1050 Manila<br>
                Telephone: 0051-54723-55 <br>
                Phone: +6399-456-1245 <br>
                Email: test@gmail.com <br>
                Website: myexampledomain.com
            </address>
            </div>


            <div class="col-sm-4 text-right">
            <img class="float-right" src="https://testruntourismoph.wanderlustmusicfestival.com/public/image/logo/logoab.png" alt="logo">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
            <address>
                <strong>To:</strong>
                <!-- name -->
            <span>to mr/mrs/ms first name last name</span><br>
            <span>customeremail@gmail.com</span>
            </address>
            </div>

            <div class="col-sm-5 text-right">
            <table class="w-full">
                <tbody>
                <tr>
                    <th>Invoice Number:</th>
                    <td>#124206932632658</td>
                </tr>
                <tr>
                    <th> Book Date: </th>
                    <!-- date -->
                    <td>sept 18, 2021 10:00am TO sept 20, 2021 10:00am  </td>

                </tr>
                </tbody>
            </table>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <table class="w-full">
                <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 5px"><div> Payment Thru gcash/onlinebanking </div></th>
                    Php 10,000.00<td> <td style="padding: 5px"></td>

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
                    <strong>paid/rejected/pending</strong>
                </td>
                <td></td>
                <!-- amount -->
               <td class="text-right small-width">Php 10,000.00</td>
                </tr>

                <tr>
                <td>
                    <strong>Service</strong>
                    <!-- bookdate -->
                    <p>Adult Count - 2</p>
                    <p>Children/Child Count - 4</p>
                    <p>Nights no. 3 </p>
                    <p>Guest no. 5</p>
                    <p>ROOM: A-101</p>
                    <p>TOUR: description of tour</p>
                    <p>EXPECT: expectation of tour</p>
                </td>
                <td></td>
                <td class="text-right"></td> 
                <!-- payment charge -->
                </tr>

                </tbody>
            </table>
            </div><!-- /table-responsive -->

            <table class="table invoice-total">
            <tbody>
                <tr>
                <td class="text-right"><strong>Total:</strong></td>
                <td class="text-right small-width">Php 15,000.00 </td>
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
                <p>cancel lation policy and terms condition</p>

                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>

</body>
</html>