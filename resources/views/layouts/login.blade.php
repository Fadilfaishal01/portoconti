<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login/style.min.css') }}">
      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>{{ $title }} | Contiporto</title>
   </head>
   <body>
      @yield('login')
   </body>
   <script src="{{ asset('assets/js/login/jquery-3.2.1.min.js') }}"></script>
   <!-- The javascript plugin to display page loading on top-->
   <script src="{{ asset('assets/js/login/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/js/login/plugins/sweetalert2.all.min.js') }}"></script>
   @include('partials.script-custome')
   @yield('script-down')
</html>

