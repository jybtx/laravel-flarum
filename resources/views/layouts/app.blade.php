<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LaraBBS') - Laravel 进阶教程</title>
    <!-- Styles -->
   <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="{{ route_class() }}-page">
        <!-- // heaer start -->
        @include('layouts._header')
        <!-- // header end -->
        <div class="container">
            <!-- // message tips start -->
            @include('shared._messages')
            <!-- // message tips end -->
            <!-- // container box start -->
            @yield('content')
            <!-- // container box end -->
        </div>
        <!-- // footer start -->
        @include('layouts._footer')
        <!-- // footer end -->
    </div>
    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
</body>
</html>