@extends('layouts.auth')

@section('content')
  <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card p-4">
            <div class="card-body">
              <h1>Enable Two-Factor Authentication</h1>
              <p class="text-body-secondary">Scan the QR code with your authenticator app (e.g. Google Authenticator, Authy), then enter the 6-digit code to confirm.</p>

              @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
              @endif

              <div class="text-center mb-3">
                {!! $qrSvg !!}
              </div>

              <p class="text-center text-body-secondary small mb-3">
                Can't scan? Enter this key manually:<br>
                <code class="user-select-all fs-6">{{ $secret }}</code>
              </p>

              @if ($errors->any())
                <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
              @endif

              <form method="POST" action="{{ route('two-factor.enable') }}">
                @csrf
                <div class="input-group mb-4">
                  <span class="input-group-text"><i class="cil-lock-locked"></i></span>
                  <input class="form-control @error('code') is-invalid @enderror"
                    type="text" name="code" inputmode="numeric"
                    pattern="[0-9]{6}" maxlength="6"
                    placeholder="000000"
                    autofocus autocomplete="one-time-code" required>
                  @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="d-grid">
                  <button class="btn btn-success" type="submit">Confirm &amp; Enable</button>
                </div>
              </form>

              <div class="mt-3 text-center">
                <a href="{{ route('profile.show') }}" class="text-body-secondary small">← Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
