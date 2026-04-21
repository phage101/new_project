@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Brands</div>
    <div class="card-body">
      <div class="d-flex flex-wrap gap-2">
        <span class="badge bg-dark">GitHub</span>
        <span class="badge bg-primary">Facebook</span>
        <span class="badge bg-info">Twitter</span>
        <span class="badge bg-danger">YouTube</span>
        <span class="badge bg-secondary">LinkedIn</span>
      </div>
      <p class="text-body-secondary mt-3 mb-0">Swap badges with official brand icon classes if your package includes them.</p>
    </div>
  </div>
@endsection
