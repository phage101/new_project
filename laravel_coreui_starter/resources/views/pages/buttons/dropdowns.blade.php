@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Dropdown</strong> <small>Single button</small></div>
      <div class="card-body">
        <div class="dropdown mb-3">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown button</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
        <div class="d-flex flex-wrap gap-2">
          @foreach(['primary','secondary','success','info','warning','danger'] as $color)
          <div class="btn-group">
            <button type="button" class="btn btn-{{ $color }} dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ ucfirst($color) }}</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Dropdown</strong> <small>Split button</small></div>
      <div class="card-body">
        <div class="d-flex flex-wrap gap-2">
          @foreach(['primary','secondary','success','info','warning','danger'] as $color)
          <div class="btn-group">
            <button type="button" class="btn btn-{{ $color }}">{{ ucfirst($color) }}</button>
            <button type="button" class="btn btn-{{ $color }} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Dropdown</strong> <small>Sizing</small></div>
      <div class="card-body">
        <div class="btn-group mb-2">
          <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Large button</button>
          <ul class="dropdown-menu"><li><a class="dropdown-item" href="#">Action</a></li><li><a class="dropdown-item" href="#">Another action</a></li></ul>
        </div>
        <div class="btn-group">
          <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Small button</button>
          <ul class="dropdown-menu"><li><a class="dropdown-item" href="#">Action</a></li><li><a class="dropdown-item" href="#">Another action</a></li></ul>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Dropdown</strong> <small>Directions</small></div>
      <div class="card-body">
        <div class="d-flex flex-wrap gap-2">
          <div class="dropup btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropup</button>
            <ul class="dropdown-menu"><li><a class="dropdown-item" href="#">Action</a></li><li><a class="dropdown-item" href="#">Another action</a></li></ul>
          </div>
          <div class="dropend btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropend</button>
            <ul class="dropdown-menu"><li><a class="dropdown-item" href="#">Action</a></li><li><a class="dropdown-item" href="#">Another action</a></li></ul>
          </div>
          <div class="dropstart btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropstart</button>
            <ul class="dropdown-menu"><li><a class="dropdown-item" href="#">Action</a></li><li><a class="dropdown-item" href="#">Another action</a></li></ul>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Dropdown</strong> <small>Menu items</small></div>
      <div class="card-body">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
          <ul class="dropdown-menu">
            <li><h6 class="dropdown-header">Dropdown header</h6></li>
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
            <li><a class="dropdown-item disabled">Disabled action</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
