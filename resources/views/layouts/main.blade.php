<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials/head')
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
       <div class="inner_container">
            @include('partials/header')
            @yield('content')
        </div>
    </div>
</body>

</html>
