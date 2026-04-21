@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Chip Input Pattern</div>
    <div class="card-body">
      <label class="form-label">Tags</label>
      <div class="d-flex flex-wrap gap-2 mb-3">
        <span class="badge bg-primary">laravel</span>
        <span class="badge bg-info">coreui</span>
        <span class="badge bg-success">mysql</span>
      </div>
      <input type="text" class="form-control" placeholder="Type and press enter to add tag">
      <div class="form-text">For production, handle chip creation and removal with Alpine.js or Livewire.</div>
    </div>
  </div>
@endsection
