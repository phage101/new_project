<!DOCTYPE html>
<html lang="en" data-coreui-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'Sign In' }} | LOGIFY</title>
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
  @yield('content')
</body>
</html>
