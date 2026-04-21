@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Toasts</div>
    <div class="card-body">
      <button class="btn btn-success" id="showToast">Show Toast</button>
      <div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
        <div id="demoToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="me-auto">System</strong>
            <small>now</small>
            <button type="button" class="btn-close" data-coreui-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Data was saved successfully.
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const trigger = document.getElementById('showToast')
      const element = document.getElementById('demoToast')
      if (!trigger || !element || !window.coreui) {
        return
      }

      const toast = new window.coreui.Toast(element)
      trigger.addEventListener('click', () => toast.show())
    })
  </script>
@endpush
