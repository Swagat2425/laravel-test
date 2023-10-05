@php
$categories = \App\Helpers\Common::cmn_get_categories();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#712cf9">

        <title>{{ config('app.name', 'Laravel Test') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('/css/common.css') }}" rel="stylesheet"/>
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        @include('layouts.nav')
        @yield('content')

        <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('/js/common.js') }}"></script>
        @stack('scripts')
    </body>
</html>