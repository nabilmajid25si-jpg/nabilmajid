@extends('admin.layouts.app')

@section('title', 'Data Product')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h3 mb-0">Data Product</h1>
        <p class="text-muted mb-0">List seluruh data product</p>
    </div>
    <a href="{{ route('product.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah Product</a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-product" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                            <th class="border-0">Nama Produk</th>
                            <th class="border-0">SKU</th>
                            <th class="border-0">Kategori</th>
                            <th class="border-0">Harga (Rp)</th>
                            <th class="border-0">Stok</th>
                            <th class="border-0">Status</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataProduct as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->sku }}</td>
                            <td>{{ $item->category }}</td>
                            <td>Rp {{ number_format((float) $item->price, 2, ',', '.') }}</td>
                            <td>{{ $item->stock }}</td>
                            <td><span class="badge {{ in_array($item->status, ['Active', 'Completed']) ? 'bg-success' : (in_array($item->status, ['Pending', 'Processing']) ? 'bg-warning text-dark' : 'bg-secondary') }}">{{ $item->status }}</span></td>
                            <td class="text-nowrap">
                                <a href="{{ route('product.edit', $item->product_id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('product.destroy', $item->product_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
