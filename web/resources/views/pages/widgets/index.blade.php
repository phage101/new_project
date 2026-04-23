@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-6 col-xl-3">
    <div class="card text-bg-primary mb-4">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-4 fw-semibold">26K <small class="fs-6 fw-normal">(-12.4% <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="12" height="12" fill="currentColor"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>)</small></div>
          <div>Users</div>
        </div>
        <div class="dropdown">
          <button class="btn btn-transparent text-white p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" width="16" height="16" fill="currentColor"><path d="M64 360a56 56 0 1 0 0 112A56 56 0 1 0 64 360zm0-160a56 56 0 1 0 0 112A56 56 0 1 0 64 200zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
          </ul>
        </div>
      </div>
      <div class="c-chart-wrapper" style="height:70px">
        <canvas id="widgetChart1" height="70"></canvas>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card text-bg-info mb-4">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-4 fw-semibold">$6.200 <small class="fs-6 fw-normal">(40.9% <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="12" height="12" fill="currentColor"><path d="M278.6 105.4c-12.5-12.5-32.8-12.5-45.3 0l-192 192c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L256 173.3 425.4 342.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-192-192z"/></svg>)</small></div>
          <div>Income</div>
        </div>
      </div>
      <div class="c-chart-wrapper" style="height:70px">
        <canvas id="widgetChart2" height="70"></canvas>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card text-bg-warning mb-4">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-4 fw-semibold">2.49% <small class="fs-6 fw-normal">(84.7% <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="12" height="12" fill="currentColor"><path d="M278.6 105.4c-12.5-12.5-32.8-12.5-45.3 0l-192 192c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L256 173.3 425.4 342.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-192-192z"/></svg>)</small></div>
          <div>Conversion Rate</div>
        </div>
      </div>
      <div class="c-chart-wrapper" style="height:70px">
        <canvas id="widgetChart3" height="70"></canvas>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card text-bg-danger mb-4">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-4 fw-semibold">44K <small class="fs-6 fw-normal">(-23.6% <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="12" height="12" fill="currentColor"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>)</small></div>
          <div>Sessions</div>
        </div>
      </div>
      <div class="c-chart-wrapper" style="height:70px">
        <canvas id="widgetChart4" height="70"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header">Traffic &amp; Sales</div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="border-start border-4 border-info px-3 mb-3">
              <small class="text-body-secondary">New Clients</small>
              <div class="fs-5 fw-semibold">9,123</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="border-start border-4 border-danger px-3 mb-3">
              <small class="text-body-secondary">Recurring Clients</small>
              <div class="fs-5 fw-semibold">22,643</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="border-start border-4 border-warning px-3 mb-3">
              <small class="text-body-secondary">Pageviews</small>
              <div class="fs-5 fw-semibold">78,623</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="border-start border-4 border-success px-3 mb-3">
              <small class="text-body-secondary">Organic</small>
              <div class="fs-5 fw-semibold">49,123</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="progress-group mb-4">
          <div class="progress-group-prepend">
            <span class="text-body-secondary small">Monday</span>
          </div>
          <div class="progress-group-bars">
            <div class="progress progress-thin">
              <div class="progress-bar bg-info" role="progressbar" style="width: 34%"></div>
            </div>
            <div class="progress progress-thin">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 78%"></div>
            </div>
          </div>
        </div>
        <div class="progress-group mb-4">
          <div class="progress-group-prepend">
            <span class="text-body-secondary small">Tuesday</span>
          </div>
          <div class="progress-group-bars">
            <div class="progress progress-thin">
              <div class="progress-bar bg-info" role="progressbar" style="width: 56%"></div>
            </div>
            <div class="progress progress-thin">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 94%"></div>
            </div>
          </div>
        </div>
        <div class="progress-group mb-4">
          <div class="progress-group-prepend">
            <span class="text-body-secondary small">Wednesday</span>
          </div>
          <div class="progress-group-bars">
            <div class="progress progress-thin">
              <div class="progress-bar bg-info" role="progressbar" style="width: 12%"></div>
            </div>
            <div class="progress progress-thin">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 67%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header">Social Media Stats</div>
      <div class="card-body">
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <span class="d-flex justify-content-center align-items-center rounded-circle bg-primary text-white" style="width:40px;height:40px;">F</span>
          </div>
          <div class="flex-grow-1 ms-3">
            <div class="fw-semibold">Facebook</div>
            <div class="progress progress-thin mt-1">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"></div>
            </div>
            <small class="text-body-secondary">89k users</small>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <span class="d-flex justify-content-center align-items-center rounded-circle bg-info text-white" style="width:40px;height:40px;">T</span>
          </div>
          <div class="flex-grow-1 ms-3">
            <div class="fw-semibold">Twitter</div>
            <div class="progress progress-thin mt-1">
              <div class="progress-bar bg-info" role="progressbar" style="width: 55%"></div>
            </div>
            <small class="text-body-secondary">55k users</small>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <span class="d-flex justify-content-center align-items-center rounded-circle bg-danger text-white" style="width:40px;height:40px;">YT</span>
          </div>
          <div class="flex-grow-1 ms-3">
            <div class="fw-semibold">YouTube</div>
            <div class="progress progress-thin mt-1">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 43%"></div>
            </div>
            <small class="text-body-secondary">43k users</small>
          </div>
        </div>
        <div class="d-flex">
          <div class="flex-shrink-0">
            <span class="d-flex justify-content-center align-items-center rounded-circle bg-warning text-dark" style="width:40px;height:40px;">IG</span>
          </div>
          <div class="flex-grow-1 ms-3">
            <div class="fw-semibold">Instagram</div>
            <div class="progress progress-thin mt-1">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 66%"></div>
            </div>
            <small class="text-body-secondary">66k users</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
