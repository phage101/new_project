@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Button</strong></div>
      <div class="card-body">
        <p class="text-body-secondary small">CoreUI includes a bunch of predefined button components, each serving its own semantic purpose.</p>
        <div class="mb-3">
          <strong>Normal</strong><br class="mb-1">
          <button type="button" class="btn btn-primary me-1">Primary</button>
          <button type="button" class="btn btn-secondary me-1">Secondary</button>
          <button type="button" class="btn btn-success me-1">Success</button>
          <button type="button" class="btn btn-danger me-1">Danger</button>
          <button type="button" class="btn btn-warning me-1">Warning</button>
          <button type="button" class="btn btn-info me-1">Info</button>
          <button type="button" class="btn btn-link">Link</button>
        </div>
        <div class="mb-3">
          <strong>Active</strong><br class="mb-1">
          <button type="button" class="btn btn-primary active me-1">Primary</button>
          <button type="button" class="btn btn-secondary active me-1">Secondary</button>
          <button type="button" class="btn btn-success active me-1">Success</button>
          <button type="button" class="btn btn-danger active me-1">Danger</button>
          <button type="button" class="btn btn-warning active me-1">Warning</button>
          <button type="button" class="btn btn-info active me-1">Info</button>
          <button type="button" class="btn btn-link active">Link</button>
        </div>
        <div class="mb-3">
          <strong>Disabled</strong><br class="mb-1">
          <button type="button" class="btn btn-primary me-1" disabled>Primary</button>
          <button type="button" class="btn btn-secondary me-1" disabled>Secondary</button>
          <button type="button" class="btn btn-success me-1" disabled>Success</button>
          <button type="button" class="btn btn-danger me-1" disabled>Danger</button>
          <button type="button" class="btn btn-warning me-1" disabled>Warning</button>
          <button type="button" class="btn btn-info me-1" disabled>Info</button>
          <button type="button" class="btn btn-link" disabled>Link</button>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Button</strong> <small>Outline</small></div>
      <div class="card-body">
        <div class="mb-3">
          <button type="button" class="btn btn-outline-primary me-1">Primary</button>
          <button type="button" class="btn btn-outline-secondary me-1">Secondary</button>
          <button type="button" class="btn btn-outline-success me-1">Success</button>
          <button type="button" class="btn btn-outline-danger me-1">Danger</button>
          <button type="button" class="btn btn-outline-warning me-1">Warning</button>
          <button type="button" class="btn btn-outline-info">Info</button>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Button</strong> <small>Sizing</small></div>
      <div class="card-body">
        <button type="button" class="btn btn-primary btn-lg me-1">Large button</button>
        <button type="button" class="btn btn-primary me-1">Default button</button>
        <button type="button" class="btn btn-primary btn-sm">Small button</button>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Button</strong> <small>Block button</small></div>
      <div class="card-body">
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="button">Button</button>
          <button class="btn btn-primary" type="button">Button</button>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Button</strong> <small>Toggle states</small></div>
      <div class="card-body">
        <button type="button" class="btn btn-primary me-1" data-bs-toggle="button" autocomplete="off">Toggle button</button>
        <button type="button" class="btn btn-primary active me-1" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off" disabled>Disabled toggle button</button>
      </div>
    </div>
  </div>
</div>
@endsection
