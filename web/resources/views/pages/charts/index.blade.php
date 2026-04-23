@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Chart.js</strong> <small>Line chart</small></div>
      <div class="card-body">
        <canvas id="lineChart" height="100"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Chart.js</strong> <small>Bar chart</small></div>
      <div class="card-body">
        <canvas id="barChart" height="160"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Chart.js</strong> <small>Doughnut chart</small></div>
      <div class="card-body">
        <canvas id="doughnutChart" height="160"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Chart.js</strong> <small>Pie chart</small></div>
      <div class="card-body">
        <canvas id="pieChart" height="160"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Chart.js</strong> <small>Radar chart</small></div>
      <div class="card-body">
        <canvas id="radarChart" height="160"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Chart.js</strong> <small>Polar area chart</small></div>
      <div class="card-body">
        <canvas id="polarChart" height="160"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><strong>Chart.js</strong> <small>Bubble chart</small></div>
      <div class="card-body">
        <canvas id="bubbleChart" height="160"></canvas>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
const months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
const colors = {
  primary: 'rgba(50, 31, 219, 0.85)',
  primaryLight: 'rgba(50, 31, 219, 0.1)',
  success: 'rgba(45, 198, 83, 0.85)',
  danger: 'rgba(229, 57, 53, 0.85)',
  warning: 'rgba(255, 179, 0, 0.85)',
  info: 'rgba(0, 188, 212, 0.85)',
};

// Line chart
new Chart(document.getElementById('lineChart'), {
  type: 'line',
  data: {
    labels: months,
    datasets: [
      {
        label: 'My First dataset',
        backgroundColor: colors.primaryLight,
        borderColor: colors.primary,
        data: [65, 59, 84, 84, 51, 55, 40, 56, 56, 70, 35, 60],
        fill: true,
      },
      {
        label: 'My Second dataset',
        backgroundColor: 'transparent',
        borderColor: colors.danger,
        data: [28, 48, 40, 19, 86, 27, 90, 34, 57, 72, 45, 80],
        fill: false,
      },
    ],
  },
  options: { responsive: true, maintainAspectRatio: true },
});

// Bar chart
new Chart(document.getElementById('barChart'), {
  type: 'bar',
  data: {
    labels: months.slice(0, 7),
    datasets: [{
      label: 'GitHub Commits',
      backgroundColor: colors.primary,
      data: [12, 59, 5, 56, 58, 15, 48],
    }],
  },
  options: { responsive: true },
});

// Doughnut
new Chart(document.getElementById('doughnutChart'), {
  type: 'doughnut',
  data: {
    labels: ['VueJs','EmberJs','ReactJs','AngularJs'],
    datasets: [{
      backgroundColor: [colors.primary, colors.success, colors.warning, colors.danger],
      data: [300, 180, 250, 220],
    }],
  },
  options: { responsive: true },
});

// Pie
new Chart(document.getElementById('pieChart'), {
  type: 'pie',
  data: {
    labels: ['Red','Green','Yellow'],
    datasets: [{
      backgroundColor: [colors.danger, colors.success, colors.warning],
      data: [300, 50, 100],
    }],
  },
  options: { responsive: true },
});

// Radar
new Chart(document.getElementById('radarChart'), {
  type: 'radar',
  data: {
    labels: ['Eating','Drinking','Sleeping','Designing','Coding','Cycling','Running'],
    datasets: [
      { label: 'My First dataset', backgroundColor: colors.primaryLight, borderColor: colors.primary, data: [65,59,90,81,56,55,40] },
      { label: 'My Second dataset', backgroundColor: 'rgba(255,179,0,0.2)', borderColor: colors.warning, data: [28,48,40,19,96,27,100] },
    ],
  },
  options: { responsive: true },
});

// Polar
new Chart(document.getElementById('polarChart'), {
  type: 'polarArea',
  data: {
    labels: ['Red','Green','Yellow','Grey','Blue'],
    datasets: [{
      backgroundColor: [colors.danger, colors.success, colors.warning, '#aaa', colors.primary],
      data: [11, 16, 7, 3, 14],
    }],
  },
  options: { responsive: true },
});

// Bubble
new Chart(document.getElementById('bubbleChart'), {
  type: 'bubble',
  data: {
    datasets: [{
      label: 'Dataset 1',
      backgroundColor: colors.primaryLight,
      borderColor: colors.primary,
      data: [{x:20,y:30,r:15},{x:40,y:10,r:10},{x:15,y:25,r:20},{x:35,y:40,r:8}],
    }],
  },
  options: { responsive: true },
});
</script>
@endpush
@endsection
