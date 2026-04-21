@extends('layouts.app')

@section('content')
  @include('components.section-page', [
    'title' => 'Progress',
    'section' => 'base',
    'description' => 'This screen is ready for your Laravel business logic and Blade partials.'
  ])
@endsection
