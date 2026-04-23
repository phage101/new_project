@extends('layouts.auth')

@section('content')
  <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card p-4">
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Login</h1>
                <p class="text-body-secondary">Sign in to your account</p>

                @if ($errors->any())
                  <div class="alert alert-danger py-2">
                    {{ $errors->first() }}
                  </div>
                @endif

                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="cil-user"></i></span>
                  <input class="form-control @error('email') is-invalid @enderror"
                    type="email" name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required autofocus>
                </div>

                <div class="input-group mb-4">
                  <span class="input-group-text"><i class="cil-lock-locked"></i></span>
                  <input class="form-control @error('password') is-invalid @enderror"
                    type="password" name="password"
                    placeholder="Password"
                    required>
                </div>

                <div class="d-grid">
                  <button class="btn btn-primary" type="submit">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
