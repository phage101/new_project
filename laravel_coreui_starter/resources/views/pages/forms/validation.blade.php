@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Validation States</div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Valid field</label>
        <input type="text" class="form-control is-valid" value="Looks good">
        <div class="valid-feedback">Looks good.</div>
      </div>

      <div class="mb-3">
        <label class="form-label">Invalid field</label>
        <input type="text" class="form-control is-invalid" value="">
        <div class="invalid-feedback">Please provide a value.</div>
      </div>

      <div class="mb-0">
        <label class="form-label">Custom help text</label>
        <input type="text" class="form-control" aria-describedby="helpBlock">
        <div id="helpBlock" class="form-text">Use 8-20 letters and numbers.</div>
      </div>
    </div>
  </div>
@endsection
