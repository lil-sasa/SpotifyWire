<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SpotifyWire</title>

        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
        <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" />

        <livewire:styles>

        <livewire:scripts>

        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')

    </head>
    <body class="bg-gray-200">

        @yield('content')

        
    </body>
</html>
