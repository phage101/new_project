@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-lg-7">

      {{-- Profile Info --}}
      <div class="card mb-4">
        <div class="card-header fw-semibold">Profile Information</div>
        <div class="card-body">

          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if ($errors->profileErrors->any())
            <div class="alert alert-danger">
              <ul class="mb-0 ps-3">
                @foreach ($errors->profileErrors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label" for="name">Name</label>
              <input type="text" id="name" name="name"
                class="form-control @if($errors->profileErrors->has('name')) is-invalid @endif"
                value="{{ old('name', $user->name) }}" required autofocus>
              @if($errors->profileErrors->has('name'))
                <div class="invalid-feedback">{{ $errors->profileErrors->first('name') }}</div>
              @endif
            </div>

            <div class="mb-4">
              <label class="form-label" for="email">Email</label>
              <input type="email" id="email" name="email"
                class="form-control @if($errors->profileErrors->has('email')) is-invalid @endif"
                value="{{ old('email', $user->email) }}" required>
              @if($errors->profileErrors->has('email'))
                <div class="invalid-feedback">{{ $errors->profileErrors->first('email') }}</div>
              @endif
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>

        </div>
      </div>

      {{-- Change Password --}}
      <div class="card mb-4">
        <div class="card-header fw-semibold">Change Password</div>
        <div class="card-body">

          @if (session('password_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('password_success') }}
              <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if ($errors->passwordErrors->any())
            <div class="alert alert-danger">
              <ul class="mb-0 ps-3">
                @foreach ($errors->passwordErrors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('profile.password') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label" for="current_password">Current Password</label>
              <input type="password" id="current_password" name="current_password"
                class="form-control @if($errors->passwordErrors->has('current_password')) is-invalid @endif"
                autocomplete="current-password" required>
              @if($errors->passwordErrors->has('current_password'))
                <div class="invalid-feedback">{{ $errors->passwordErrors->first('current_password') }}</div>
              @endif
            </div>

            <div class="mb-3">
              <label class="form-label" for="password">New Password</label>
              <input type="password" id="password" name="password"
                class="form-control @if($errors->passwordErrors->has('password')) is-invalid @endif"
                autocomplete="new-password" required>
              @if($errors->passwordErrors->has('password'))
                <div class="invalid-feedback">{{ $errors->passwordErrors->first('password') }}</div>
              @endif
            </div>

            <div class="mb-4">
              <label class="form-label" for="password_confirmation">Confirm New Password</label>
              <input type="password" id="password_confirmation" name="password_confirmation"
                class="form-control" autocomplete="new-password" required>
            </div>

            <button type="submit" class="btn btn-primary">Change Password</button>
          </form>

        </div>
      </div>

      {{-- Two-Factor Authentication --}}
      <div class="card">
        <div class="card-header fw-semibold">Two-Factor Authentication</div>
        <div class="card-body">

          @if ($user->hasTwoFactorEnabled())
            <div class="d-flex align-items-center justify-content-between">
              <div>
                <span class="badge bg-success me-2">Enabled</span>
                <span class="text-body-secondary small">Your account is protected with a TOTP authenticator app.</span>
              </div>
              <form method="POST" action="{{ route('two-factor.disable') }}" class="d-inline">
                @csrf
                <div class="input-group input-group-sm">
                  <input type="password" name="password" class="form-control form-control-sm"
                    placeholder="Confirm password" required autocomplete="current-password">
                  <button type="submit" class="btn btn-sm btn-outline-danger"
                    onclick="return confirm('Disable two-factor authentication?')">
                    Disable
                  </button>
                </div>
                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
              </form>
            </div>
          @else
            <div class="d-flex align-items-center justify-content-between">
              <div>
                <span class="badge bg-secondary me-2">Disabled</span>
                <span class="text-body-secondary small">Add an extra layer of security to your account.</span>
              </div>
              <a href="{{ route('two-factor.setup') }}" class="btn btn-sm btn-outline-success">Enable 2FA</a>
            </div>
          @endif

        </div>
      </div>

    </div>
  </div>
@endsection
