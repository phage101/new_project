@extends('layouts.app')

@section('content')
  <div class="card mb-4">
    <div class="card-header">Theme Colors</div>
    <div class="card-body">
      <div class="row g-3">
        @foreach (['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'] as $tone)
          <div class="col-6 col-md-3">
            <div class="p-3 rounded bg-{{ $tone }} {{ in_array($tone, ['light', 'warning']) ? 'text-dark' : 'text-white' }}">
              <div class="fw-semibold text-capitalize">{{ $tone }}</div>
              <small class="opacity-75">CoreUI utility color</small>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
