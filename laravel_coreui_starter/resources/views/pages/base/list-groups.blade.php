@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><strong>List Group</strong> <small>Basic example</small></div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Morbi leo risus</li>
          <li class="list-group-item">Porta ac consectetur ac</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>List Group</strong> <small>Active items</small></div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item active" aria-current="true">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Morbi leo risus</li>
          <li class="list-group-item">Porta ac consectetur ac</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>List Group</strong> <small>Disabled items</small></div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item disabled" aria-disabled="true">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Morbi leo risus</li>
          <li class="list-group-item">Porta ac consectetur ac</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>List Group</strong> <small>Links and buttons</small></div>
      <div class="card-body">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Cras justo odio</a>
          <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
          <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
          <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
          <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><strong>List Group</strong> <small>Flush</small></div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Morbi leo risus</li>
          <li class="list-group-item">Porta ac consectetur ac</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>List Group</strong> <small>Contextual classes</small></div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">A simple default list group item</li>
          <li class="list-group-item list-group-item-primary">A simple primary list group item</li>
          <li class="list-group-item list-group-item-secondary">A simple secondary list group item</li>
          <li class="list-group-item list-group-item-success">A simple success list group item</li>
          <li class="list-group-item list-group-item-danger">A simple danger list group item</li>
          <li class="list-group-item list-group-item-warning">A simple warning list group item</li>
          <li class="list-group-item list-group-item-info">A simple info list group item</li>
          <li class="list-group-item list-group-item-light">A simple light list group item</li>
          <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
        </ul>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>List Group</strong> <small>With badges</small></div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Cras justo odio <span class="badge bg-primary rounded-pill">14</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Dapibus ac facilisis in <span class="badge bg-primary rounded-pill">2</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Morbi leo risus <span class="badge bg-primary rounded-pill">1</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
