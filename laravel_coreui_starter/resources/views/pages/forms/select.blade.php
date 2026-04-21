@extends('layouts.app')

@section('content')
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Select Controls</div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Default Select</label>
            <select class="form-select">
              <option selected>Choose...</option>
              <option value="1">Option one</option>
              <option value="2">Option two</option>
              <option value="3">Option three</option>
            </select>
          </div>

          <div class="mb-0">
            <label class="form-label">Multiple Select</label>
            <select class="form-select" multiple size="4">
              <option>Alpha</option>
              <option>Beta</option>
              <option>Gamma</option>
              <option>Delta</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Datalist</div>
        <div class="card-body">
          <label for="browser-list" class="form-label">Choose a browser</label>
          <input class="form-control" list="datalistOptions" id="browser-list" placeholder="Type to search...">
          <datalist id="datalistOptions">
            <option value="Chrome"></option>
            <option value="Firefox"></option>
            <option value="Safari"></option>
            <option value="Edge"></option>
          </datalist>
        </div>
      </div>
    </div>
  </div>
@endsection
