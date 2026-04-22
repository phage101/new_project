@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>CoreUI Icons</strong> <small>Free</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">CoreUI Free Icons is a beautifully crafted, open source icon library for Bootstrap and CoreUI. Icons available as SVG, web font, and inline SVG.</p>
        <div class="row g-3 text-center">
          @php
          $icons = [
            'cil-speedometer','cil-user','cil-settings','cil-bell','cil-chart-pie','cil-lock-locked',
            'cil-home','cil-list','cil-pencil','cil-trash','cil-plus','cil-minus',
            'cil-check','cil-ban','cil-warning','cil-info','cil-check-circle','cil-x-circle',
            'cil-search','cil-envelope-open','cil-envelope-closed','cil-phone','cil-location-pin','cil-calendar',
            'cil-clock','cil-cloud-upload','cil-cloud-download','cil-file','cil-folder','cil-print',
            'cil-zoom-in','cil-zoom-out','cil-fullscreen','cil-fullscreen-exit','cil-share','cil-link',
            'cil-star','cil-heart','cil-bookmark','cil-tag','cil-layers','cil-grid',
            'cil-menu','cil-options','cil-cog','cil-lock-unlocked','cil-shield-alt','cil-people',
            'cil-cursor','cil-cursor-move','cil-reload','cil-loop','cil-arrows-alt','cil-swap',
          ];
          @endphp
          @foreach($icons as $icon)
          <div class="col-6 col-md-3 col-xl-2">
            <div class="border rounded p-3 h-100 d-flex flex-column align-items-center justify-content-center">
              <i class="{{ $icon }} icon icon-xl mb-2" style="font-size: 1.5rem;"></i>
              <div class="small text-body-secondary text-break">{{ $icon }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
