@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Breadcrumb</strong></div>
      <div class="card-body">
        <p class="text-body-secondary small">Indicate the current page's location within a navigational hierarchy that automatically adds separators.</p>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </nav>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
          </ol>
        </nav>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Breadcrumb</strong> <small>Dividers</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Dividers are automatically added in CSS through <code>::before</code> and <code>content</code>. They can be changed by modifying a local CSS custom property <code>--bs-breadcrumb-divider</code>.</p>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
          </ol>
        </nav>
        <nav style="--bs-breadcrumb-divider: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E\");" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header"><strong>Breadcrumb</strong> <small>Accessibility</small></div>
      <div class="card-body">
        <p class="text-body-secondary small">Since breadcrumbs provide a navigation, it's a good idea to add a meaningful label such as <code>aria-label="breadcrumb"</code> to describe the type of navigation provided in the <code>&lt;nav&gt;</code> element, as well as applying an <code>aria-current="page"</code> to the last item of the set to indicate that it represents the current page.</p>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection
