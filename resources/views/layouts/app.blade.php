<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title> 
    <meta name="description" content="@yield('description', config('app.name', 'Laravel') )" />   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="{{ route_class() }}-page">

        @include('layouts._header')

        <div class="container">

            @include('shared._messages')

            @yield('content')

        </div>

        @include('layouts._footer')
    </div>

    @if(app()->isLocal())
        @include('sudosu::user-selector')
    @endif

    <!-- Scripts -->
    <script  type="text/javascript" src="{{ asset(mix('js/app.js')) }}" defer></script>
    @yield('scripts')
</body>
</html>
