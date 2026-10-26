@extends('layouts.guest.app')

@section('title', 'Login')
@section('body-class', 'auth-page')

@section('content')
<section class="auth-section light-background">
  <div class="container">
    <div class="auth-card">
      <h2>Login</h2>
      <p class="auth-subtitle">Masuk untuk mengakses dashboard admin.</p>

      <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="username"
                 class="form-control @error('username') is-invalid @enderror"
                 value="{{ old('username') }}" placeholder="Masukkan username" required autofocus>
          @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password"
                 class="form-control @error('password') is-invalid @enderror"
                 placeholder="Masukkan password" required>
          @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn-auth">Login</button>
      </form>

      <p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
    </div>
  </div>
</section>
@endsection
