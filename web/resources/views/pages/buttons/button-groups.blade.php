@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Button Group</strong> <small>Basic example</small></div>
      <div class="card-body">
        <p>Wrap a series of <code>.btn</code> elements in <code>.btn-group</code>.</p>
        <div class="btn-group mb-3" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary">Left</button>
          <button type="button" class="btn btn-primary">Middle</button>
          <button type="button" class="btn btn-primary">Right</button>
        </div>
        <div class="btn-group" role="group">
          <a href="#" class="btn btn-primary active" aria-current="page">Active link</a>
          <a href="#" class="btn btn-primary">Link</a>
          <a href="#" class="btn btn-primary">Link</a>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Button Group</strong> <small>Mixed styles</small></div>
      <div class="card-body">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn btn-danger">Left</button>
          <button type="button" class="btn btn-warning">Middle</button>
          <button type="button" class="btn btn-success">Right</button>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Button Group</strong> <small>Outlined styles</small></div>
      <div class="card-body">
        <div class="btn-group" role="group" aria-label="Basic outlined example">
          <button type="button" class="btn btn-outline-primary">Left</button>
          <button type="button" class="btn btn-outline-primary">Middle</button>
          <button type="button" class="btn btn-outline-primary">Right</button>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Button Group</strong> <small>Checkbox and radio button groups</small></div>
      <div class="card-body">
        <div class="btn-group mb-3" role="group" aria-label="Basic checkbox toggle button group">
          <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
          <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label>
          <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
          <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label>
          <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
          <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>
        </div>
        <br>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
          <label class="btn btn-outline-primary" for="btnradio1">Radio 1</label>
          <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio2">Radio 2</label>
          <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio3">Radio 3</label>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Button Group</strong> <small>Sizing</small></div>
      <div class="card-body">
        <div class="btn-group btn-group-lg mb-2" role="group">
          <button type="button" class="btn btn-outline-dark">Left</button>
          <button type="button" class="btn btn-outline-dark">Middle</button>
          <button type="button" class="btn btn-outline-dark">Right</button>
        </div><br>
        <div class="btn-group mb-2" role="group">
          <button type="button" class="btn btn-outline-dark">Left</button>
          <button type="button" class="btn btn-outline-dark">Middle</button>
          <button type="button" class="btn btn-outline-dark">Right</button>
        </div><br>
        <div class="btn-group btn-group-sm" role="group">
          <button type="button" class="btn btn-outline-dark">Left</button>
          <button type="button" class="btn btn-outline-dark">Middle</button>
          <button type="button" class="btn btn-outline-dark">Right</button>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Button Toolbar</strong></div>
      <div class="card-body">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
          <div class="btn-group me-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-outline-secondary">1</button>
            <button type="button" class="btn btn-outline-secondary">2</button>
            <button type="button" class="btn btn-outline-secondary">3</button>
            <button type="button" class="btn btn-outline-secondary">4</button>
          </div>
          <div class="btn-group me-2" role="group" aria-label="Second group">
            <button type="button" class="btn btn-outline-secondary">5</button>
            <button type="button" class="btn btn-outline-secondary">6</button>
            <button type="button" class="btn btn-outline-secondary">7</button>
          </div>
          <div class="btn-group" role="group" aria-label="Third group">
            <button type="button" class="btn btn-outline-secondary">8</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
