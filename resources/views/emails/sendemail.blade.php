<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
    .btn {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }
    .btn-grey {background-color: #e7e7e7; color: black;} /* Gray */
    .btn-grey:hover {background-color: black; color: #e7e7e7;} /* Gray */
    </style>
</head>
<body>
<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>
<a href="{{$details['url']}}extra={{$details['extra']}}&status={{$details['status']}}&cn={{$details['profileID']}}&bdetails={{$details['bdetails']}}"  class="btn btn-grey">Download Receipt</a>
    
</body>
</html>