<!DOCTYPE html>
<html lang="en" data-coreui-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'Admin' }} | CoreUI + Laravel</title>
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
  @include('components.sidebar')

  <div class="wrapper d-flex flex-column min-vh-100">
    @include('components.header', ['breadcrumbs' => $breadcrumbs ?? []])

    <div class="body flex-grow-1">
      <div class="container-lg px-4 py-4">
        @yield('content')
      </div>
    </div>

    @include('components.footer')
  </div>

  @stack('scripts')
</body>
</html>
