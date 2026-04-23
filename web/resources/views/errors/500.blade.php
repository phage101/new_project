@extends('layouts.auth')

@section('content')
  <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <h1 class="display-1 fw-bold">500</h1>
          <h4 class="mb-3">Server error</h4>
          <p class="text-body-secondary">Something went wrong. Please try again in a few moments.</p>
          <a href="{{ url('/') }}" class="btn btn-primary">Back to dashboard</a>
        </div>
      </div>
    </div>
  </div>
@endsection
