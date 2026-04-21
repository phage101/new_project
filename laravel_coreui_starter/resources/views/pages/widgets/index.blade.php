@extends('layouts.app')

@section('content')
  <div class="row g-3">
    <div class="col-md-6 col-xl-3">
      <div class="card text-bg-primary">
        <div class="card-body">
          <div class="text-uppercase small">New Users</div>
          <div class="fs-3 fw-semibold">1,204</div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card text-bg-success">
        <div class="card-body">
          <div class="text-uppercase small">Orders</div>
          <div class="fs-3 fw-semibold">842</div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card text-bg-warning">
        <div class="card-body">
          <div class="text-uppercase small">Tickets</div>
          <div class="fs-3 fw-semibold">76</div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card text-bg-danger">
        <div class="card-body">
          <div class="text-uppercase small">Alerts</div>
          <div class="fs-3 fw-semibold">9</div>
        </div>
      </div>
    </div>
  </div>
@endsection
