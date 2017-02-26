$exception<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">


</head>
<body>
    <div id="app">
       <!-- Authentication Links -->
       @if (Auth::check())
        @include('layouts.topnav')
        @endif
        @include('layouts.flash')
       {{$exception}}
      
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
      @yield('pagescript')
    <script>
$(function() {

  if('.alert'){
  setTimeout(function() { $('.alert').alert('close') ; }, 2000);
  }

});
    </script>
</body>
</html>
