@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Popover</strong> <small>Basic example</small></div>
      <div class="card-body">
        <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Popover</strong> <small>Four directions</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Four options are available: top, right, bottom, and left aligned.</p>
        <button type="button" class="btn btn-secondary me-1" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on top</button>
        <button type="button" class="btn btn-secondary me-1" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on right</button>
        <button type="button" class="btn btn-secondary me-1" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on bottom</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on left</button>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Popover</strong> <small>Dismiss on next click</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Use the <code>focus</code> trigger to dismiss popovers on the user's next click of an element other than the toggle element.</p>
        <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Dismissible popover" data-bs-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
  document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => new bootstrap.Popover(el));
</script>
@endpush
@endsection
