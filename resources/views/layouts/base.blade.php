<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href="./bootstrap.css">
        <title>{{config('app.name', 'Bus Ticketing')}}</title>
    </head>
    <body>
        <div class="container">
            @yield('container')
        </div>
    </body>
</html>
