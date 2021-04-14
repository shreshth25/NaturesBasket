<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Natures Basket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('admin.common.styles')
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('admin.common.navbar')
    @include('admin.common.sidebar')
    <div class="content-wrapper p-2">
        @yield('content')
    </div>
      @include('admin.common.footer')
</div>

    @include('admin.common.scripts')
    @yield('scripts')
</body>
</html>
