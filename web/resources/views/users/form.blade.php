@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span class="fw-semibold">{{ isset($user) ? 'Edit User' : 'Add User' }}</span>
          <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary">← Back</a>
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

          <form method="POST" action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}">
            @csrf
            @isset($user)
              @method('PUT')
            @endisset

            <div class="mb-3">
              <label class="form-label" for="name">Name</label>
              <input type="text" id="name" name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}" required autofocus>
              @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="email">Email</label>
              <input type="email" id="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email ?? '') }}" required>
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="password">
                {{ isset($user) ? 'New Password' : 'Password' }}
                @isset($user)
                  <small class="text-body-secondary">(leave blank to keep current)</small>
                @endisset
              </label>
              <input type="password" id="password" name="password"
                class="form-control @error('password') is-invalid @enderror"
                {{ isset($user) ? '' : 'required' }} autocomplete="new-password">
              @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
              <label class="form-label" for="role_id">Role</label>
              <select id="role_id" name="role_id"
                class="form-select @error('role_id') is-invalid @enderror">
                <option value="">— None —</option>
                @foreach ($roles as $role)
                  <option value="{{ $role->id }}"
                    {{ old('role_id', isset($user) ? $user->roles->first()?->id : null) == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                  </option>
                @endforeach
              </select>
              @error('role_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Save Changes' : 'Create User' }}</button>
              <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
