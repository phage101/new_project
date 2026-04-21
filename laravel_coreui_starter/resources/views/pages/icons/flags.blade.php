@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Flags</div>
    <div class="card-body">
      <p class="text-body-secondary mb-3">Flag icons can be added using your preferred icon pack or SVG sprite.</p>
      <div class="row g-3">
        @foreach (['US', 'DE', 'FR', 'ES', 'PL', 'BR'] as $country)
          <div class="col-6 col-md-2">
            <div class="border rounded p-3 text-center">
              <div class="fw-semibold">{{ $country }}</div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
