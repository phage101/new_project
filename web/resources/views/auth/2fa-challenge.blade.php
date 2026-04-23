@extends('layouts.auth')

@section('content')
  <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card p-4">
            <div class="card-body">
              <h1>Two-Factor Authentication</h1>
              <p class="text-body-secondary">Enter the 6-digit code from your authenticator app.</p>

              @if ($errors->any())
                <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
              @endif

              <form method="POST" action="{{ route('two-factor.verify') }}">
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
                  <button class="btn btn-primary" type="submit">Verify</button>
                </div>
              </form>

              <div class="mt-3 text-center">
                <a href="{{ route('login') }}" class="text-body-secondary small">← Back to login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
