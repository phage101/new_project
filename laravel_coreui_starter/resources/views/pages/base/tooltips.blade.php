@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Tooltip</strong> <small>Basic example</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Hover over the links below to see tooltips:</p>
        <p class="text-body-secondary">
          Tight pants next level keffiyeh
          <a href="#" data-bs-toggle="tooltip" data-bs-title="Tooltip text"> you probably </a>
          haven't heard of them. Photo booth beard raw denim letterpress vegan messenger bag stumptown.
          Farm-to-table seitan, mcsweeney's fixie sustainable quinoa 8-bit american apparel
          <a href="#" data-bs-toggle="tooltip" data-bs-title="Tooltip text"> have a </a>
          terry richardson vinyl chambray.
        </p>
        <p class="text-body-secondary small">Hover over the buttons below to see the four tooltips directions: top, right, bottom, and left.</p>
        <button type="button" class="btn btn-secondary me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Tooltip on top</button>
        <button type="button" class="btn btn-secondary me-1" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Tooltip on right</button>
        <button type="button" class="btn btn-secondary me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Tooltip on bottom</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Tooltip on left</button>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Tooltip</strong> <small>HTML content</small></div>
      <div class="card-body">
        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">Tooltip with HTML</button>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
  document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));
</script>
@endpush
@endsection
