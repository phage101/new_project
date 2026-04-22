@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Badge</strong></div>
      <div class="card-body">
        <p class="text-body-secondary small">Badges scale to suit the size of the parent element by using relative font sizing and <code>em</code> units.</p>
        <h1>Example heading <span class="badge bg-secondary">New</span></h1>
        <h2>Example heading <span class="badge bg-secondary">New</span></h2>
        <h3>Example heading <span class="badge bg-secondary">New</span></h3>
        <h4>Example heading <span class="badge bg-secondary">New</span></h4>
        <h5>Example heading <span class="badge bg-secondary">New</span></h5>
        <h6>Example heading <span class="badge bg-secondary">New</span></h6>
        <hr>
        <p class="text-body-secondary small">Badges can be used as part of links or buttons to provide a counter.</p>
        <button type="button" class="btn btn-primary">Notifications <span class="badge bg-secondary">4</span></button>
        <hr>
        <button type="button" class="btn btn-primary">
          Profile <span class="badge bg-secondary">9</span>
          <span class="visually-hidden">unread messages</span>
        </button>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Badge</strong> <small>Contextual variations</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Add any of the below-mentioned modifier classes to change the appearance of a badge.</p>
        <span class="badge bg-primary me-1">primary</span>
        <span class="badge bg-secondary me-1">secondary</span>
        <span class="badge bg-success me-1">success</span>
        <span class="badge bg-danger me-1">danger</span>
        <span class="badge bg-warning text-dark me-1">warning</span>
        <span class="badge bg-info me-1">info</span>
        <span class="badge bg-light text-dark me-1">light</span>
        <span class="badge bg-dark me-1">dark</span>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Badge</strong> <small>Pill badges</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Use the <code>.rounded-pill</code> modifier class to make badges more rounded.</p>
        <span class="badge rounded-pill bg-primary me-1">primary</span>
        <span class="badge rounded-pill bg-secondary me-1">secondary</span>
        <span class="badge rounded-pill bg-success me-1">success</span>
        <span class="badge rounded-pill bg-danger me-1">danger</span>
        <span class="badge rounded-pill bg-warning text-dark me-1">warning</span>
        <span class="badge rounded-pill bg-info me-1">info</span>
        <span class="badge rounded-pill bg-light text-dark me-1">light</span>
        <span class="badge rounded-pill bg-dark me-1">dark</span>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Badge</strong> <small>Positioned</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Use utilities to modify a <code>.badge</code> and position it in the corner of a link or button.</p>
        <button type="button" class="btn btn-primary position-relative me-3">
          Inbox
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            99+
            <span class="visually-hidden">unread messages</span>
          </span>
        </button>
        <button type="button" class="btn btn-primary position-relative">
          Profile
          <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
            <span class="visually-hidden">New alerts</span>
          </span>
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
