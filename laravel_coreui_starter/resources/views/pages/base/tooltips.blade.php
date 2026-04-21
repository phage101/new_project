@extends('layouts.app')

@section('content')
  @include('components.section-page', [
    'title' => 'Tooltips',
    'section' => 'base',
    'description' => 'This screen is ready for your Laravel business logic and Blade partials.'
  ])
@endsection
