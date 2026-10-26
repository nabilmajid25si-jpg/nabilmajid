@extends('layouts.guest.app')

@section('title', 'Register')
@section('body-class', 'auth-page')

@section('content')
<section class="auth-section light-background">
  <div class="container">
    <div class="auth-card">
      <h2>Register</h2>
      <p class="auth-subtitle">Buat akun baru Mana ERP.</p>

      <form action="{{ route('register.process') }}" method="POST">
        

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama lengkap" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="nama@email.com" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
        </div>

        <button type="submit" class="btn-auth">Register</button>
      </form>

      <p class="auth-switch">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </div>
  </div>
</section>
@endsection
