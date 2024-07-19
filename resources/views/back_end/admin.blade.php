<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('backend/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/bundles/chocolat/dist/css/chocolat.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href='{{asset('backend/img/favicon.ico')}}' />
</head>
<body>
    @include('back_end.header')
    <main>
        @yield('content')
    </main>
    
    
</body>
<script src="{{asset('backend/js/app.min.js')}}"></script>
<!-- JS Libraies -->
<script src="{{asset('backend/bundles/apexcharts/apexcharts.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{asset('backend/js/page/index.js')}}"></script>
<!-- Template JS File -->
<script src="{{asset('backend/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{asset('backend/js/custom.js')}}"></script>
</html>