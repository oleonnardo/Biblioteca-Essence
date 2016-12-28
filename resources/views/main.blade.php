<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <title>@yield('page-title')  | Essence</title>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body >
    
    @include('includes.menu')

    @yield('body-content')
     
    @include('includes.footer')
</body>
</html>
