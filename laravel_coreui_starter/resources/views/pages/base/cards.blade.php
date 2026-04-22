@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Card</strong> <small>Basic example</small></div>
      <div class="card-body">
        <div class="card" style="width: 18rem;">
          <svg class="card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#868e96"></rect>
          </svg>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Card</strong> <small>Content types</small></div>
      <div class="card-body">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>
        <div class="card mb-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Card</strong> <small>Header and footer</small></div>
      <div class="card-body">
        <div class="card mb-3">
          <div class="card-header">Featured</div>
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
          <div class="card-footer text-body-secondary">2 days ago</div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Card</strong> <small>Background color</small></div>
      <div class="card-body">
        <div class="row">
          @foreach(['primary','secondary','success','danger','warning','info','light','dark'] as $color)
          <div class="col-md-3 mb-3">
            <div class="card text-{{ in_array($color, ['warning','light']) ? 'dark' : 'white' }} bg-{{ $color }}">
              <div class="card-header">Header</div>
              <div class="card-body"><p class="card-text">Some text with a {{ $color }} background.</p></div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Card</strong> <small>Card groups</small></div>
      <div class="card-body">
        <div class="card-group">
          <div class="card">
            <svg class="card-img-top" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#868e96"></rect></svg>
            <div class="card-body"><h5 class="card-title">Card title</h5><p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p></div>
            <div class="card-footer"><small class="text-body-secondary">Last updated 3 mins ago</small></div>
          </div>
          <div class="card">
            <svg class="card-img-top" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#868e96"></rect></svg>
            <div class="card-body"><h5 class="card-title">Card title</h5><p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p></div>
            <div class="card-footer"><small class="text-body-secondary">Last updated 3 mins ago</small></div>
          </div>
          <div class="card">
            <svg class="card-img-top" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#868e96"></rect></svg>
            <div class="card-body"><h5 class="card-title">Card title</h5><p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p></div>
            <div class="card-footer"><small class="text-body-secondary">Last updated 3 mins ago</small></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
