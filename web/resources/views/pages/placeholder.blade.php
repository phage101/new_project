@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title mb-2">{{ $title }}</h4>
      <p class="text-body-secondary mb-0">
        This page is wired in routes and navigation. Replace this placeholder with your Blade implementation for
        <strong>{{ $section }}/{{ $page }}</strong>.
      </p>
    </div>
  </div>
@endsection
