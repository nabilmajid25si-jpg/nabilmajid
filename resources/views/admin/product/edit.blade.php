@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Data Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </nav>
        <h1 class="h3 mb-0">Edit Product</h1>
        <p class="text-muted mb-0">Form untuk mengubah data product.</p>
    </div>
    <a href="{{ route('product.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('product.update', $dataProduct->product_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $dataProduct->name) }}">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" id="sku" name="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku', $dataProduct->sku) }}">
                            @error('sku')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <input type="text" id="category" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $dataProduct->category) }}">
                            @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga (Rp)</label>
                            <input type="number" id="price" name="price" step="0.01" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $dataProduct->price) }}">
                            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" id="stock" name="stock" step="1" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $dataProduct->stock) }}">
                            @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">-- Pilih --</option>
                                <option value="Active" @selected(old('status', $dataProduct->status) == 'Active')>Active</option>
                                <option value="Inactive" @selected(old('status', $dataProduct->status) == 'Inactive')>Inactive</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                <a href="{{ route('product.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
