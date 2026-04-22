@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Colors</strong> <small>Brand colors</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">CoreUI provides an elaborate set of theme colors, making it easy to apply any color to HTML elements using background-color utilities.</p>
        <div class="row g-3">
          @foreach ([
            ['primary', '#321fdb', 'white'],
            ['secondary', '#9da5b1', 'white'],
            ['success', '#2eb85c', 'white'],
            ['info', '#3399ff', 'white'],
            ['warning', '#f9b115', 'dark'],
            ['danger', '#e55353', 'white'],
            ['light', '#ebedef', 'dark'],
            ['dark', '#4f5d73', 'white'],
          ] as [$color, $hex, $textColor])
          <div class="col-md-3 mb-3">
            <div class="p-3 rounded bg-{{ $color }} text-{{ $textColor }}">
              <div class="fw-semibold text-capitalize">.bg-{{ $color }}</div>
              <small class="opacity-75">{{ $hex }}</small>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Colors</strong> <small>Gray colors</small></div>
      <div class="card-body">
        <div class="row g-2">
          @foreach ([100, 200, 300, 400, 500, 600, 700, 800, 900] as $shade)
          <div class="col-md-1">
            <div class="p-3 rounded" style="background-color: #{ 100 + ($shade - 100) / 8 * 1.55 }px; background-color: hsl(210, 11%, {{ 100 - ($shade / 10) }}%);">
              <div class="small text-center">{{ $shade }}</div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="mt-3">
          @foreach ([100, 200, 300, 400, 500, 600, 700, 800, 900] as $shade)
            <span class="d-inline-block me-2 mb-2 p-2 rounded" style="background-color: hsl(210, 11%, {{ 100 - ($shade / 10) }}%); min-width: 60px; text-align: center; font-size: 0.75rem;">gray-{{ $shade }}</span>
          @endforeach
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Colors</strong> <small>Color utilities</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Colorize text with a color utility. Note that links will still have their original styling when inside an <code>a</code> element.</p>
        <p class="text-primary">.text-primary</p>
        <p class="text-secondary">.text-secondary</p>
        <p class="text-success">.text-success</p>
        <p class="text-danger">.text-danger</p>
        <p class="text-warning">.text-warning</p>
        <p class="text-info">.text-info</p>
        <p class="text-light bg-dark rounded px-2">.text-light</p>
        <p class="text-dark">.text-dark</p>
        <p class="text-body-secondary">.text-body-secondary</p>
        <p class="text-white bg-dark rounded px-2">.text-white</p>
        <p class="text-black-50">.text-black-50</p>
      </div>
    </div>
  </div>
</div>
@endsection
