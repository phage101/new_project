@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Badges</div>
    <div class="card-body">
      <div class="d-flex flex-wrap gap-2 mb-4">
        <span class="badge bg-primary">Primary</span>
        <span class="badge bg-secondary">Secondary</span>
        <span class="badge bg-success">Success</span>
        <span class="badge bg-danger">Danger</span>
        <span class="badge bg-warning text-dark">Warning</span>
        <span class="badge bg-info">Info</span>
      </div>

      <div class="d-flex flex-wrap gap-3">
        <button class="btn btn-outline-primary position-relative">
          Inbox
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">5</span>
        </button>
        <button class="btn btn-outline-success position-relative">
          Tasks
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">12</span>
        </button>
      </div>
    </div>
  </div>
@endsection
