@extends('layouts.admin.app')

@section('title', 'Data Order')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h3 mb-0">Data Order</h1>
        <p class="text-muted mb-0">List seluruh data order</p>
    </div>
    <a href="{{ route('order.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah Order</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-order" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                            <th class="border-0">No. Order</th>
                            <th class="border-0">Nama Pelanggan</th>
                            <th class="border-0">Tanggal Order</th>
                            <th class="border-0">Total (Rp)</th>
                            <th class="border-0">Status</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataOrder as $item)
                        <tr>
                            <td>{{ $item->order_number }}</td>
                            <td>{{ $item->customer_name }}</td>
                            <td>{{ $item->order_date }}</td>
                            <td>Rp {{ number_format((float) $item->total_amount, 2, ',', '.') }}</td>
                            <td><span class="badge {{ in_array($item->status, ['Active', 'Completed']) ? 'bg-success' : (in_array($item->status, ['Pending', 'Processing']) ? 'bg-warning text-dark' : 'bg-secondary') }}">{{ $item->status }}</span></td>
                            <td class="text-nowrap">
                                <a href="{{ route('order.edit', $item->order_id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('order.destroy', $item->order_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
