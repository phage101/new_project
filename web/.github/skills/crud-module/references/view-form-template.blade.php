{{--
  Template for both create.blade.php and edit.blade.php.
  For create: action="{{ route('resource.store') }}", no @method, button = "Create Resource"
  For edit:   action="{{ route('resource.update', $resource) }}", add @method('PUT'), button = "Save Changes"
              Pre-populate with old('field', $resource->field)
--}}
@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span class="fw-semibold">Add Resource</span>  {{-- or "Edit Resource" --}}
          <a href="{{ route('resource.index') }}" class="btn btn-sm btn-outline-secondary">← Back</a>
        </div>
        <div class="card-body">

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('resource.store') }}">
            @csrf
            {{-- Add for edit forms: @method('PUT') --}}

            <div class="mb-3">
              <label class="form-label" for="name">Name</label>
              <input type="text" id="name" name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"  {{-- edit: old('name', $resource->name) --}}
                required autofocus>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Add more fields here, following the same pattern --}}

            <button type="submit" class="btn btn-primary">Create Resource</button>
            {{-- edit: "Save Changes" --}}
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
