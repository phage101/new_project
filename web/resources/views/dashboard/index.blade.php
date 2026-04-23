@extends('layouts.app')

@section('content')
  <div class="row g-3 mb-4">
    @foreach ($stats as $stat)
      <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
          <div class="card-body">
            <div class="text-body-secondary text-uppercase small mb-1">{{ $stat['label'] }}</div>
            <div class="fs-4 fw-semibold">{{ $stat['value'] }}</div>
            <div class="small text-success">{{ $stat['trend'] }}</div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="card mb-4">
    <div class="card-header">Overview</div>
    <div class="card-body">
      <canvas id="main-chart" height="80"></canvas>
    </div>
  </div>

  <div class="card">
    <div class="card-header">Recent Activity</div>
    <div class="card-body p-0">
      <table class="table mb-0 border-top">
        <thead>
          <tr>
            <th class="px-3">User</th>
            <th>Action</th>
            <th class="text-end px-3">Time</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($recentActivity as $activity)
            <tr>
              <td class="px-3">{{ $activity['user'] }}</td>
              <td>{{ $activity['action'] }}</td>
              <td class="text-end px-3">{{ $activity['time'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
