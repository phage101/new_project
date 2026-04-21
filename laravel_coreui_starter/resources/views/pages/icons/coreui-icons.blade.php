@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">CoreUI Icons</div>
    <div class="card-body">
      <div class="row g-3">
        @foreach (['cil-speedometer', 'cil-user', 'cil-settings', 'cil-bell', 'cil-chart-pie', 'cil-lock-locked'] as $icon)
          <div class="col-6 col-md-4 col-xl-2">
            <div class="border rounded p-3 text-center h-100">
              <i class="{{ $icon }} icon icon-xl mb-2"></i>
              <div class="small text-body-secondary">{{ $icon }}</div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
