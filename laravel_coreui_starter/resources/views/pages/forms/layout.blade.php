@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Form Layout</div>
    <div class="card-body">
      <form class="row g-3">
        <div class="col-md-6">
          <label class="form-label">First name</label>
          <input type="text" class="form-control" placeholder="Jane">
        </div>
        <div class="col-md-6">
          <label class="form-label">Last name</label>
          <input type="text" class="form-control" placeholder="Doe">
        </div>
        <div class="col-12">
          <label class="form-label">Address</label>
          <input type="text" class="form-control" placeholder="1234 Main St">
        </div>
        <div class="col-md-6">
          <label class="form-label">City</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-md-4">
          <label class="form-label">State</label>
          <select class="form-select">
            <option selected>Choose...</option>
            <option>California</option>
            <option>Texas</option>
          </select>
        </div>
        <div class="col-md-2">
          <label class="form-label">ZIP</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Save profile</button>
        </div>
      </form>
    </div>
  </div>
@endsection
