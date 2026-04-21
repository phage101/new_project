@extends('layouts.app')

@section('content')
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Checks</div>
        <div class="card-body">
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="check1" checked>
            <label class="form-check-label" for="check1">Checked checkbox</label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="check2">
            <label class="form-check-label" for="check2">Default checkbox</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="switch1" checked>
            <label class="form-check-label" for="switch1">Enable notifications</label>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Radios</div>
        <div class="card-body">
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="role" id="role1" checked>
            <label class="form-check-label" for="role1">Admin</label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="role" id="role2">
            <label class="form-check-label" for="role2">Editor</label>
          </div>
          <div class="form-check mb-0">
            <input class="form-check-input" type="radio" name="role" id="role3">
            <label class="form-check-label" for="role3">Viewer</label>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
