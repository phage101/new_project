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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById('sidebar');
      const toggleBtn = document.querySelector('.sidebar-toggler');
      const headerToggle = document.querySelector('[data-coreui-toggle="sidebar"]');
      const body = document.body;

      if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();

          const collapsed = body.classList.toggle('sidebar-narrow');
          // Keep both selectors for compatibility with CoreUI variants.
          sidebar.classList.toggle('sidebar-narrow', collapsed);
          localStorage.setItem('sidebar-collapsed', collapsed ? 'true' : 'false');
        });

        // Restore state on load.
        if (localStorage.getItem('sidebar-collapsed') === 'true') {
          body.classList.add('sidebar-narrow');
          sidebar.classList.add('sidebar-narrow');
        } else {
          body.classList.remove('sidebar-narrow');
          sidebar.classList.remove('sidebar-narrow');
        }
      }

      // Mobile toggle
      if (headerToggle && sidebar) {
        headerToggle.addEventListener('click', function(e) {
          e.preventDefault();
          sidebar.classList.toggle('show');
        });
      }

      // Close mobile sidebar when clicking links
      document.querySelectorAll('.sidebar .nav-item > .nav-link, .sidebar .nav-group-toggle').forEach(link => {
        link.addEventListener('click', function() {
          if (window.innerWidth < 768 && sidebar.classList.contains('show')) {
            sidebar.classList.remove('show');
          }
        });
      });
    });
  </script>
</body>
</html>
