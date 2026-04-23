<header class="header header-sticky p-0 border-bottom">
  <div class="container-fluid px-4">
    <!-- <button class="header-toggler" type="button" data-coreui-toggle="sidebar" data-coreui-target="#sidebar">
      <i class="icon icon-lg cil-menu"></i>
    </button> -->

    <ul class="header-nav d-none d-md-flex">
      <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
    </ul>

    <ul class="header-nav ms-auto align-items-center">
      <li class="nav-item dropdown">
        <button class="btn btn-ghost-secondary nav-link py-2 px-3" data-coreui-toggle="dropdown" type="button" aria-expanded="false">
          <i class="icon icon-lg cil-contrast"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><button class="dropdown-item" type="button" data-theme-value="light">Light</button></li>
          <li><button class="dropdown-item" type="button" data-theme-value="dark">Dark</button></li>
          <li><button class="dropdown-item" type="button" data-theme-value="auto">Auto</button></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <button class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" type="button" aria-expanded="false">
          <div class="avatar avatar-md">
            <img class="avatar-img" src="{{ asset('images/avatars/1.jpg') }}" alt="User avatar">
          </div>
        </button>
        <ul class="dropdown-menu dropdown-menu-end pt-0">
          <li><h6 class="dropdown-header bg-body-secondary fw-semibold py-2">Account</h6></li>
          <li><span class="dropdown-item-text">{{ auth()->user()->name ?? 'User' }}</span></li>
          <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="dropdown-item" type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>

  @include('components.breadcrumb', ['breadcrumbs' => $breadcrumbs ?? []])
</header>
