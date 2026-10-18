@extends('admin.layouts.app')

@section('title', 'Tambah Order')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Data Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Order</li>
            </ol>
        </nav>
        <h1 class="h3 mb-0">Tambah Order</h1>
        <p class="text-muted mb-0">Form untuk menambahkan data order baru.</p>
    </div>
    <a href="{{ route('order.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="order_number" class="form-label">No. Order</label>
                            <input type="text" id="order_number" name="order_number" class="form-control @error('order_number') is-invalid @enderror" value="{{ old('order_number') }}">
                            @error('order_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Nama Pelanggan</label>
                            <input type="text" id="customer_name" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}">
                            @error('customer_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="order_date" class="form-label">Tanggal Order</label>
                            <input type="date" id="order_date" name="order_date" class="form-control @error('order_date') is-invalid @enderror" value="{{ old('order_date') }}">
                            @error('order_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="total_amount" class="form-label">Total (Rp)</label>
                            <input type="number" id="total_amount" name="total_amount" step="0.01" class="form-control @error('total_amount') is-invalid @enderror" value="{{ old('total_amount') }}">
                            @error('total_amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">-- Pilih --</option>
                                <option value="Pending" @selected(old('status') == 'Pending')>Pending</option>
                                <option value="Processing" @selected(old('status') == 'Processing')>Processing</option>
                                <option value="Completed" @selected(old('status') == 'Completed')>Completed</option>
                                <option value="Cancelled" @selected(old('status') == 'Cancelled')>Cancelled</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('order.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
