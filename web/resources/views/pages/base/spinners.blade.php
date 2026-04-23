@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Spinner</strong> <small>Border</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Use the border spinners for a lightweight loading indicator.</p>
        <div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>
        <hr>
        <p class="text-body-secondary small">The border spinner uses <code>currentColor</code> for its border-color. You can use any of our text color utilities on the standard spinner.</p>
        <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-border text-secondary" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-border text-success" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-border text-warning" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-border text-dark" role="status"><span class="visually-hidden">Loading...</span></div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Spinner</strong> <small>Growing</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">If you don't fancy a border spinner, switch to the grow spinner. While it doesn't technically spin, it does repeatedly grow!</p>
        <div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div>
        <hr>
        <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-grow text-secondary" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-grow text-success" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-grow text-danger" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-grow text-warning" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-grow text-info" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-grow text-light" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-grow text-dark" role="status"><span class="visually-hidden">Loading...</span></div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Spinner</strong> <small>Size</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Add <code>.spinner-border-sm</code> and <code>.spinner-grow-sm</code> to make a smaller spinner that can quickly be used within other components.</p>
        <div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>
        <div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Spinner</strong> <small>Buttons</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Use spinners within buttons to indicate an action is currently processing or taking place.</p>
        <button class="btn btn-primary me-1" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          <span class="visually-hidden">Loading...</span>
        </button>
        <button class="btn btn-primary" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
        </button>
        <hr>
        <button class="btn btn-primary me-1" type="button" disabled>
          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
          <span class="visually-hidden">Loading...</span>
        </button>
        <button class="btn btn-primary" type="button" disabled>
          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
          Loading...
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
