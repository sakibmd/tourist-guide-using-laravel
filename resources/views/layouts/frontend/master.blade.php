<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

  @yield('css')
</head>
<body>


  <!-- Navbar -->
    @include('layouts.frontend.inc.nav')


    <!-- Main content -->
    @yield('content')
  

    {{-- footer --}}
    @include('layouts.frontend.inc.footer')
    <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

<script>
  setTimeout(function() {
      $('#alert').fadeOut('fast');
  }, 6000);
</script>


@yield('scripts')

</body>
</html>
