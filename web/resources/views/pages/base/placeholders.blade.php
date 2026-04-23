@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Placeholder</strong></div>
      <div class="card-body">
        <p class="text-body-secondary small">In the example below, we take a typical card component and recreate it with placeholders applied to create a "loading card".</p>
        <div class="d-flex justify-content-around p-3">
          <div class="card" style="width: 18rem;">
            <svg class="card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#868e96"></rect>
            </svg>
            <div class="card-body">
              <h5 class="card-title placeholder-glow"><span class="placeholder col-6"></span></h5>
              <p class="card-text placeholder-glow">
                <span class="placeholder col-7"></span>
                <span class="placeholder col-4"></span>
                <span class="placeholder col-4"></span>
                <span class="placeholder col-6"></span>
                <span class="placeholder col-8"></span>
              </p>
              <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Placeholder</strong> <small>Width</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">You can change the <code>width</code> through grid column classes, width utilities, or inline styles.</p>
        <span class="placeholder col-6"></span>
        <span class="placeholder w-75"></span>
        <span class="placeholder" style="width: 25%;"></span>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Placeholder</strong> <small>Color</small></div>
      <div class="card-body">
        <span class="placeholder col-12"></span>
        <span class="placeholder col-12 bg-primary"></span>
        <span class="placeholder col-12 bg-secondary"></span>
        <span class="placeholder col-12 bg-success"></span>
        <span class="placeholder col-12 bg-danger"></span>
        <span class="placeholder col-12 bg-warning"></span>
        <span class="placeholder col-12 bg-info"></span>
        <span class="placeholder col-12 bg-light"></span>
        <span class="placeholder col-12 bg-dark"></span>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Placeholder</strong> <small>Sizing</small></div>
      <div class="card-body">
        <span class="placeholder col-12 placeholder-lg"></span>
        <span class="placeholder col-12"></span>
        <span class="placeholder col-12 placeholder-sm"></span>
        <span class="placeholder col-12 placeholder-xs"></span>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Placeholder</strong> <small>Animation</small></div>
      <div class="card-body">
        <p class="placeholder-glow"><span class="placeholder col-12"></span></p>
        <p class="placeholder-wave"><span class="placeholder col-12"></span></p>
      </div>
    </div>
  </div>
</div>
@endsection
