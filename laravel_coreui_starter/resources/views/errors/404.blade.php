@extends('layouts.auth')

@section('content')
  <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <h1 class="display-1 fw-bold">404</h1>
          <h4 class="mb-3">Page not found</h4>
          <p class="text-body-secondary">The page you are looking for does not exist.</p>
          <a href="{{ url('/') }}" class="btn btn-primary">Go to dashboard</a>
        </div>
      </div>
    </div>
  </div>
@endsection
