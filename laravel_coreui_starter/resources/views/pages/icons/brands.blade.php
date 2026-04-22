@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Brand Icons</strong></div>
      <div class="card-body">
        <p class="text-body-secondary small">CoreUI brand icons provide SVG and web font icons for popular brands and services.</p>
        <div class="row g-3 text-center">
          @php
          $brands = [
            'cib-github' => 'GitHub',
            'cib-twitter' => 'Twitter',
            'cib-facebook' => 'Facebook',
            'cib-instagram' => 'Instagram',
            'cib-youtube' => 'YouTube',
            'cib-linkedin' => 'LinkedIn',
            'cib-google' => 'Google',
            'cib-apple' => 'Apple',
            'cib-amazon' => 'Amazon',
            'cib-microsoft' => 'Microsoft',
            'cib-slack' => 'Slack',
            'cib-discord' => 'Discord',
            'cib-docker' => 'Docker',
            'cib-git' => 'Git',
            'cib-npm' => 'npm',
            'cib-node-js' => 'Node.js',
            'cib-react' => 'React',
            'cib-vue-js' => 'Vue.js',
            'cib-angular' => 'Angular',
            'cib-laravel' => 'Laravel',
            'cib-php' => 'PHP',
            'cib-html5' => 'HTML5',
            'cib-css3-shiled' => 'CSS3',
            'cib-javascript' => 'JavaScript',
          ];
          @endphp
          @foreach($brands as $icon => $label)
          <div class="col-6 col-md-3 col-xl-2">
            <div class="border rounded p-3 h-100 d-flex flex-column align-items-center justify-content-center">
              <i class="{{ $icon }} icon icon-xl mb-2" style="font-size: 1.5rem;"></i>
              <div class="small text-body-secondary">{{ $label }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
