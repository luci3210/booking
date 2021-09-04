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
        padding: 10px;
        margin: 0 0;
    }
    .flex-d{
        display: flex;
        width: 100%;
        flex-wrap: wrap;
    }
    .w-1{
        width: 10%;
        display: block;
        flex: 0 0 auto;
    }
    .w-2{
        width: 20%;
        display: block;
        flex: 0 0 auto;
    }
    .w-3{
        width: 30%;
        display: block;
        flex: 0 0 auto;
    }
    .w-4{
        width: 40%;
        display: block;
        flex: 0 0 auto;
    }
    .w-5{
        width: 50%;
        display: block;
        flex: 0 0 auto;
    }
    .w-6{
        width: 60%;
        display: block;
        flex: 0 0 auto;
    }
    .w-7{
        width: 70%;
        display: block;
        flex: 0 0 auto;
    }
    .w-8{
        width: 80%;
        display: block;
        flex: 0 0 auto;
    }
    .w-9{
        width: 90%;
        display: block;
        flex: 0 0 auto;
    }
    .w-10{
        width: 100%;
        display: block;
        flex: 0 0 auto;
    }
    .tbl-col{
        display: table-column;
    }
    .mbt-0{
        margin-bottom: 0;
    }
    .mtp-1{
        margin-top: 1rem;
    }
    .ptp-1{
        padding-top: 1rem;
    }
    .mtp-1{
        margin-top: 2rem;
    }
    </style>
</head>
<body class="bg-main">

<div class="">
    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    /* .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:10px 5px;word-break:normal;} */
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-73oq{border-color:#000000;text-align:left;vertical-align:top}
    .tg .tg-0lax{text-align:left;vertical-align:top}
    table{
        width: 100%; 
        padding: 5px;
        background-image:url('{{asset("image/logo/logoa.png")}}');
        background-repeat: no-repeat;
        background-size: contain;
        background-position:center center ;
    }
    </style>
    <table class="tg invoice">
    <thead>
    <tr>
        <td class="tg-73oq">
            <h4>From:</h4>
            <address>
                <strong>test company</strong><br>
                Address: P.O. Box 1201, Manila Central Post Office 1050 Manila<br>
                Telephone: 0051-54723-55 <br>
                Phone: +6399-456-1245 <br>
                Email: test@gmail.com <br>
                Website: myexampledomain.com
            </address>
        </td>
        <td class="tg-0lax" >
            <div>
            <img  style="float:right; padding-top:30px " src="{{asset('image/logo/logov2.jpg')}}" alt="logo">
            </div>
        </td>
    </tr>
    <tr>
        <td class="tg-73oq"style="text-align: left;" >
            <address>
            <strong>To:</strong>
            <!-- name -->
            <span>to mr/mrs/ms first name last name</span><br>
            <span>customeremail@gmail.com</span>
            </address>
        </td>
        <td class="tg-0lax text-right" style="text-align: right;">
            <h6 style="margin-bottom: 5px ;font-size: 16px;">Invoice Number:#124206932632658 </h6>
            <p style="font-size: 12px;">Book Date: sept 18, 2021 10:00am TO sept 20, 2021 10:00am </p>
        </td>
    </tr>
    <tr>
        <td class="tg-73oq"style="text-align: left;" >
        <div> Payment Thru gcash/onlinebanking </div>
        Php 10,000.00
        </td>
    </tr>
    <tr>
        <td>
        &nbsp;
        </td>
    </tr>
    <tr class="mtp-2">
        <td class="tg-73oq"style="text-align: left;" >
            <strong>Service </strong>
            <!-- bookdate -->
            <p class="mbt-0">Adult Count - 2</p>
            <p class="mbt-0">Children/Child Count - 4</p>
            <p class="mbt-0">Nights no. 3 </p>
            <p class="mbt-0">Guest no. 5</p>
            <p class="mbt-0">ROOM: A-101</p>
            <p class="mbt-0">TOUR: description of tour</p>
            <p class="mbt-0">EXPECT: expectation of tour</p>
        </td>
    </tr>
    </thead>
    </table>
    
 
</div>


</body>
</html>