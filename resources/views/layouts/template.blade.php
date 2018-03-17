<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{URL::to('bst/css/bootstrap.css')}}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>

@yield('content')


<script src="{{URL::to('bst/js/jQuery.js')}}"></script>
<script src="{{URL::to('bst/js/bootstrap.js')}}"></script>
<script src="{{URL::to('bst/js/app.js')}}"></script>
</body>
</html>