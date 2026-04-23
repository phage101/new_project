@extends('layouts.app')

@section('content')
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Basic Inputs</div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Password">
          </div>
          <div class="mb-0">
            <label class="form-label">Read only</label>
            <input type="text" class="form-control" value="Read only value" readonly>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Textarea and Size</div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Small input</label>
            <input type="text" class="form-control form-control-sm" placeholder="Small input">
          </div>
          <div class="mb-3">
            <label class="form-label">Normal input</label>
            <input type="text" class="form-control" placeholder="Default input">
          </div>
          <div class="mb-3">
            <label class="form-label">Large input</label>
            <input type="text" class="form-control form-control-lg" placeholder="Large input">
          </div>
          <div class="mb-0">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="3" placeholder="Write details..."></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
