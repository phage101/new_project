@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Input Groups</div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control" placeholder="username">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Amount</label>
        <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control" placeholder="0.00">
          <span class="input-group-text">USD</span>
        </div>
      </div>

      <div class="mb-0">
        <label class="form-label">Website</label>
        <div class="input-group">
          <span class="input-group-text">https://</span>
          <input type="text" class="form-control" placeholder="example.com">
        </div>
      </div>
    </div>
  </div>
@endsection
