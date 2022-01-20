<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8">
  </head>
  <body>
    <div class="content">
        @yield('content')
    </div>
  </body>
</html>