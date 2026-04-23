@if (!empty($breadcrumbs))
  <div class="header-divider"></div>
  <div class="container-fluid px-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-0 py-2">
        @foreach ($breadcrumbs as $crumb)
          <li class="breadcrumb-item {{ !empty($crumb['active']) ? 'active' : '' }}">
            {{ $crumb['label'] }}
          </li>
        @endforeach
      </ol>
    </nav>
  </div>
@endif
