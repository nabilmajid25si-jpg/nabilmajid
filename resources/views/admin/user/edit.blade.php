@extends('layouts.admin.app')

@section('title', 'Edit User')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Data User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
            </ol>
        </nav>
        <h1 class="h3 mb-0">Edit User</h1>
        <p class="text-muted mb-0">Form untuk mengubah data user.</p>
    </div>
    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('user.update', $dataUser->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $dataUser->name) }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $dataUser->email) }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text">Kosongkan jika tidak ingin mengubah password.</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
