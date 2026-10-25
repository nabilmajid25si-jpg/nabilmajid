@extends('layouts.admin.app')

@section('title', 'Data User')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h3 mb-0">Data User</h1>
        <p class="text-muted mb-0">List seluruh data user</p>
    </div>
    <a href="{{ route('user.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah User</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-user" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">Nama</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Dibuat</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataUser as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at?->format('d M Y') }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                            <td colspan="4" class="text-center text-muted py-4">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
