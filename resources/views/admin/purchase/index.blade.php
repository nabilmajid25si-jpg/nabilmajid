@extends('layouts.admin.app')

@section('title', 'Data Pembelian')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h3 mb-0">Data Pembelian Stok</h1>
        <p class="text-muted mb-0">CRUD 1 &mdash; <span class="badge bg-primary">Eloquent ORM</span></p>
    </div>
    <a href="{{ route('purchase.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah Pembelian</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="GET" action="{{ route('purchase.index') }}" class="row g-2 mb-3">
            <div class="col-md-5">
                <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Cari nama produk / supplier...">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search me-1"></i> Cari</button>
                @if ($q)<a href="{{ route('purchase.index') }}" class="btn btn-link">Reset</a>@endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">Tanggal</th>
                        <th class="border-0">Supplier</th>
                        <th class="border-0">Produk</th>
                        <th class="border-0">Qty</th>
                        <th class="border-0">Harga/Unit (Rp)</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataPurchase as $item)
                        <tr>
                            <td>{{ $dataPurchase->firstItem() + $loop->index }}</td>
                            <td>{{ $item->purchase_date->format('d M Y') }}</td>
                            {{-- relasi Eloquent: belongsTo Supplier & belongsTo Product --}}
                            <td>{{ $item->supplier->name ?? '-' }}</td>
                            <td>{{ $item->product->name ?? '-' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format((float) $item->unit_cost, 2, ',', '.') }}</td>
                            <td><span class="badge {{ $item->status === 'Received' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $item->status }}</span></td>
                            <td class="text-nowrap">
                                <a href="{{ route('purchase.edit', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('purchase.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                            <td colspan="8" class="text-center text-muted py-4">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $dataPurchase->links() }}</div>
    </div>
</div>
@endsection
