@extends('layouts.app')

@section('content')
  @include('components.section-page', [
    'title' => 'Collapses',
    'section' => 'base',
    'description' => 'This screen is ready for your Laravel business logic and Blade partials.'
  ])
@endsection
