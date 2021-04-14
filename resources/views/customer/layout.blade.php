<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Natures Basket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('customer.common.styles')
    @yield('styles')
</head>
<body>

    @include('customer.common.navbar')
    @yield('content')
    @include('customer.common.footer')



    @include('customer.common.scripts')
    @yield('scripts')
</body>
</html>
