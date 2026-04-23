@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Navs</strong> <small>Base nav</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">The base <code>.nav</code> component is built with flexbox and provides a strong foundation for building all types of navigation components.</p>
        <ul class="nav">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Active</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
        </ul>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Navs</strong> <small>Horizontal alignment</small></div>
      <div class="card-body">
        <ul class="nav justify-content-center mb-3">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Active</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
        </ul>
        <ul class="nav justify-content-end">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Active</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
        </ul>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Navs</strong> <small>Tabs</small></div>
      <div class="card-body">
        <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Active</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
        </ul>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Navs</strong> <small>Pills</small></div>
      <div class="card-body">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Active</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
        </ul>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Navs</strong> <small>Fill and justify</small></div>
      <div class="card-body">
        <ul class="nav nav-pills nav-fill mb-3">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Active</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Much longer nav link</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
        </ul>
        <ul class="nav nav-pills nav-justified">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Active</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Much longer nav link</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
