@extends('layouts.app')

@section('content')
  <div class="card mb-4">
    <div class="card-header">Charts</div>
    <div class="card-body" style="height: 320px">
      <canvas id="charts-page-canvas"></canvas>
    </div>
  </div>

  <div class="card">
    <div class="card-body text-body-secondary">
      Use this page as the central charting workspace for reporting modules.
    </div>
  </div>
@endsection
