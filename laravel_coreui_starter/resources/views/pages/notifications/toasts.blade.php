@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Toast</strong> <small>Basic</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Toasts are as flexible as you need and have very little required markup.</p>
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <svg class="rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
              <rect width="100%" height="100%" fill="#007aff"></rect>
            </svg>
            <strong class="me-auto">CoreUI</strong>
            <small>7 min ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">Hello, world! This is a toast message.</div>
        </div>
        <hr>
        <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Toast</strong> <small>Translucent</small></div>
      <div class="card-body bg-dark rounded">
        <p class="text-body-secondary small">Toasts are slightly translucent to blend in with what's below them.</p>
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <svg class="rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
            <strong class="me-auto">CoreUI</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">Hello, world! This is a toast message.</div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Toast</strong> <small>Stacking</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">You can stack toasts by wrapping them in a toast container.</p>
        <div class="toast-container position-static">
          <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <svg class="rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
              <strong class="me-auto">CoreUI</strong>
              <small>just now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">See? Just like this.</div>
          </div>
          <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <svg class="rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
              <strong class="me-auto">CoreUI</strong>
              <small>2 seconds ago</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">Heads up, toasts will stack automatically.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Toast</strong> <small>Placement</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Place toasts with custom CSS as you need them. The top right is often used for notifications.</p>
        <div class="bg-dark position-relative rounded" style="min-height: 240px;">
          <div class="toast-container position-absolute top-0 end-0 p-3">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <svg class="rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
                <strong class="me-auto">CoreUI</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">Hello, world! This is a toast message.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Live Toast --}}
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <svg class="rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
      <strong class="me-auto">CoreUI</strong>
      <small>just now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">Hello, world! This is a live toast demo.</div>
  </div>
</div>

@push('scripts')
<script>
  document.getElementById('liveToastBtn')?.addEventListener('click', function() {
    new bootstrap.Toast(document.getElementById('liveToast')).show();
  });
</script>
@endpush
@endsection
