@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Range Inputs</div>
    <div class="card-body">
      <div class="mb-4">
        <label for="range1" class="form-label">Default range</label>
        <input type="range" class="form-range" min="0" max="100" id="range1">
      </div>

      <div class="mb-4">
        <label for="range2" class="form-label">Pricing threshold</label>
        <input type="range" class="form-range" min="100" max="1000" step="50" id="range2">
      </div>

      <div class="mb-0">
        <label for="range3" class="form-label">Disabled range</label>
        <input type="range" class="form-range" id="range3" disabled>
      </div>
    </div>
  </div>
@endsection
