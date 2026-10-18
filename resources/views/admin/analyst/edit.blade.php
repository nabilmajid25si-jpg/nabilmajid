@extends('admin.layouts.app')

@section('title', 'Edit Analyst')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('analyst.index') }}">Data Analyst</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Analyst</li>
            </ol>
        </nav>
        <h1 class="h3 mb-0">Edit Analyst</h1>
        <p class="text-muted mb-0">Form untuk mengubah data analyst.</p>
    </div>
    <a href="{{ route('analyst.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('analyst.update', $dataAnalyst->analyst_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $dataAnalyst->name) }}">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $dataAnalyst->email) }}">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telepon</label>
                            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $dataAnalyst->phone) }}">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="specialization" class="form-label">Spesialisasi</label>
                            <input type="text" id="specialization" name="specialization" class="form-control @error('specialization') is-invalid @enderror" value="{{ old('specialization', $dataAnalyst->specialization) }}">
                            @error('specialization')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="hire_date" class="form-label">Tanggal Bergabung</label>
                            <input type="date" id="hire_date" name="hire_date" class="form-control @error('hire_date') is-invalid @enderror" value="{{ old('hire_date', $dataAnalyst->hire_date) }}">
                            @error('hire_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">-- Pilih --</option>
                                <option value="Active" @selected(old('status', $dataAnalyst->status) == 'Active')>Active</option>
                                <option value="Inactive" @selected(old('status', $dataAnalyst->status) == 'Inactive')>Inactive</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                <a href="{{ route('analyst.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
