<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href="./bootstrap.css">
        <title>{{config('app.name', 'Bus Ticketing')}}</title>
    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
            @yield('container')
        </div>
    </body>
<!-- Footer -->
<footer class="page-footer font-small bg-primary p-4">
    <div class="footer-copyright text-center">© 2020 Copyright:
      {{config('app.name', 'Bus Ticketing')}}. All rights reserved
    </div>  
  </footer>
</html>
