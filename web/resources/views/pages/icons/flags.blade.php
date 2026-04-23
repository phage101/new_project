@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header"><strong>Flag Icons</strong></div>
      <div class="card-body">
        <p class="text-body-secondary small">CoreUI flag icons provide SVG and web font icons for countries worldwide.</p>
        <div class="row g-3 text-center">
          @php
          $flags = [
            'cif-us' => 'United States',
            'cif-gb' => 'United Kingdom',
            'cif-de' => 'Germany',
            'cif-fr' => 'France',
            'cif-es' => 'Spain',
            'cif-it' => 'Italy',
            'cif-pl' => 'Poland',
            'cif-br' => 'Brazil',
            'cif-cn' => 'China',
            'cif-jp' => 'Japan',
            'cif-kr' => 'Korea',
            'cif-in' => 'India',
            'cif-ru' => 'Russia',
            'cif-au' => 'Australia',
            'cif-ca' => 'Canada',
            'cif-mx' => 'Mexico',
            'cif-ar' => 'Argentina',
            'cif-za' => 'South Africa',
            'cif-ng' => 'Nigeria',
            'cif-eg' => 'Egypt',
            'cif-sa' => 'Saudi Arabia',
            'cif-ae' => 'UAE',
            'cif-tr' => 'Turkey',
            'cif-nl' => 'Netherlands',
          ];
          @endphp
          @foreach($flags as $icon => $label)
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
