@php
  $navigation = config('navigation', []);
@endphp

<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
  <div class="sidebar-header border-bottom">
    <div class="sidebar-brand text-white fw-semibold">
      CoreUI Laravel
    </div>
    <button class="btn-close btn-close-white d-lg-none" type="button" data-coreui-toggle="unfoldable"></button>
  </div>

  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    @foreach ($navigation as $item)
      @if (($item['type'] ?? null) === 'title')
        <li class="nav-title">{{ $item['label'] }}</li>
      @elseif (($item['type'] ?? null) === 'item')
        @php
          $isRoute = isset($item['route']);
          $isActive = $isRoute && request()->routeIs($item['route']);
        @endphp
        <li class="nav-item">
          @if ($isRoute)
            <a class="nav-link {{ $isActive ? 'active' : '' }}" href="{{ route($item['route']) }}">
              @if (!empty($item['icon']))
                <i class="nav-icon {{ $item['icon'] }}"></i>
              @endif
              {{ $item['label'] }}
              @if (!empty($item['badge']))
                <span class="badge badge-sm bg-{{ $item['badge']['color'] }} ms-auto">{{ $item['badge']['text'] }}</span>
              @endif
            </a>
          @else
            <a class="nav-link" href="{{ $item['href'] }}" target="_blank" rel="noopener noreferrer">
              @if (!empty($item['icon']))
                <i class="nav-icon {{ $item['icon'] }}"></i>
              @endif
              {{ $item['label'] }}
            </a>
          @endif
        </li>
      @elseif (($item['type'] ?? null) === 'group')
        @php
          $hasActiveChild = collect($item['items'] ?? [])->contains(function ($child) {
              return isset($child['route']) && request()->routeIs($child['route']);
          });
        @endphp
        <li class="nav-group {{ $hasActiveChild ? 'show' : '' }}">
          <a class="nav-link nav-group-toggle" href="#">
            @if (!empty($item['icon']))
              <i class="nav-icon {{ $item['icon'] }}"></i>
            @endif
            {{ $item['label'] }}
          </a>
          <ul class="nav-group-items">
            @foreach (($item['items'] ?? []) as $child)
              <li class="nav-item">
                @if (!empty($child['route']))
                  <a class="nav-link {{ request()->routeIs($child['route']) ? 'active' : '' }}" href="{{ route($child['route']) }}">
                    {{ $child['label'] }}
                  </a>
                @else
                  <a class="nav-link" href="{{ $child['href'] }}" target="_blank" rel="noopener noreferrer">
                    {{ $child['label'] }}
                    @if (!empty($child['badge']))
                      <span class="badge badge-sm bg-{{ $child['badge']['color'] }} ms-auto">{{ $child['badge']['text'] }}</span>
                    @endif
                  </a>
                @endif
              </li>
            @endforeach
          </ul>
        </li>
      @endif
    @endforeach
  </ul>

  <div class="sidebar-footer border-top d-none d-md-flex">
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>
</div>
