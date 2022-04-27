@extends('master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            font-size:24px;
            justify-content:center;
            text-align:center;
            align-items:center;
        }
    </style>
</head>
<body>
    <div class="container">
    Product added to star!

<br><br>
<a href="/starred"> Check your starred items</a>
    </div>

</body>
</html>

@endsection