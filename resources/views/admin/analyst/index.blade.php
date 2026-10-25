@extends('layouts.admin.app')

@section('title', 'Data Analyst')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h3 mb-0">Data Analyst</h1>
        <p class="text-muted mb-0">List seluruh data analyst</p>
    </div>
    <a href="{{ route('analyst.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah Analyst</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-analyst" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                            <th class="border-0">Nama</th>
                            <th class="border-0">Email</th>
                            <th class="border-0">Telepon</th>
                            <th class="border-0">Spesialisasi</th>
                            <th class="border-0">Tanggal Bergabung</th>
                            <th class="border-0">Status</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataAnalyst as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->specialization }}</td>
                            <td>{{ $item->hire_date }}</td>
                            <td><span class="badge {{ in_array($item->status, ['Active', 'Completed']) ? 'bg-success' : (in_array($item->status, ['Pending', 'Processing']) ? 'bg-warning text-dark' : 'bg-secondary') }}">{{ $item->status }}</span></td>
                            <td class="text-nowrap">
                                <a href="{{ route('analyst.edit', $item->analyst_id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('analyst.destroy', $item->analyst_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
