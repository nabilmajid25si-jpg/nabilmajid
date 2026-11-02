@extends('layouts.admin.app')

@section('title', 'Data Supplier')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h3 mb-0">Data Supplier</h1>
        <p class="text-muted mb-0">CRUD 2 &mdash; <span class="badge bg-warning text-dark">Query Builder</span></p>
    </div>
    <a href="{{ route('supplier.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah Supplier</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="GET" action="{{ route('supplier.index') }}" class="row g-2 mb-3">
            <div class="col-md-5">
                <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Cari nama / telepon / email...">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search me-1"></i> Cari</button>
                @if ($q)<a href="{{ route('supplier.index') }}" class="btn btn-link">Reset</a>@endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">Nama Supplier</th>
                        <th class="border-0">Telepon</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Jml Pembelian</th>
                        <th class="border-0">Total Qty</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataSupplier as $item)
                        <tr>
                            <td>{{ $dataSupplier->firstItem() + $loop->index }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone ?? '-' }}</td>
                            <td>{{ $item->email ?? '-' }}</td>
                            {{-- hasil leftJoin + COUNT / SUM dari Query Builder --}}
                            <td><span class="badge bg-info text-dark">{{ $item->purchases_count }}</span></td>
                            <td>{{ $item->total_qty }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('supplier.edit', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('supplier.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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

        <div class="mt-3">{{ $dataSupplier->links() }}</div>
    </div>
</div>
@endsection
