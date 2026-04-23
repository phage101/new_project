@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Chip</strong> <small>Basic</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Chips are compact elements that represent an input, attribute, or action.</p>
        <span class="badge rounded-pill bg-primary me-1">Primary</span>
        <span class="badge rounded-pill bg-secondary me-1">Secondary</span>
        <span class="badge rounded-pill bg-success me-1">Success</span>
        <span class="badge rounded-pill bg-danger me-1">Danger</span>
        <span class="badge rounded-pill bg-warning text-dark me-1">Warning</span>
        <span class="badge rounded-pill bg-info me-1">Info</span>
        <span class="badge rounded-pill bg-light text-dark me-1">Light</span>
        <span class="badge rounded-pill bg-dark me-1">Dark</span>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Chip</strong> <small>With close button</small></div>
      <div class="card-body">
        <span class="badge rounded-pill bg-primary me-1">Primary <button type="button" class="btn-close btn-close-white ms-1" style="font-size:0.5em" aria-label="Remove"></button></span>
        <span class="badge rounded-pill bg-secondary me-1">Secondary <button type="button" class="btn-close btn-close-white ms-1" style="font-size:0.5em" aria-label="Remove"></button></span>
        <span class="badge rounded-pill bg-success me-1">Success <button type="button" class="btn-close btn-close-white ms-1" style="font-size:0.5em" aria-label="Remove"></button></span>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Chip</strong> <small>With avatar</small></div>
      <div class="card-body">
        <span class="badge rounded-pill bg-primary d-inline-flex align-items-center gap-1 me-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
          John Doe
        </span>
      </div>
    </div>
  </div>
</div>
@endsection
