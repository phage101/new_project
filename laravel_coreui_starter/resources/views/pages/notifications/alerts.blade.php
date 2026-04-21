@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Alerts</div>
    <div class="card-body">
      <div class="alert alert-primary" role="alert">A simple primary alert.</div>
      <div class="alert alert-success" role="alert">Operation completed successfully.</div>
      <div class="alert alert-warning" role="alert">Please verify your account settings.</div>
      <div class="alert alert-danger mb-0" role="alert">An error occurred while processing the request.</div>
    </div>
  </div>
@endsection
