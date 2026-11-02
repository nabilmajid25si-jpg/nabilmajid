@extends('layouts.admin.app')

@section('title', 'Data Category')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h3 mb-0">Data Category</h1>
        <p class="text-muted mb-0">CRUD 2 &mdash; <span class="badge bg-warning text-dark">Query Builder</span></p>
    </div>
    <a href="{{ route('category.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah Category</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="GET" action="{{ route('category.index') }}" class="row g-2 mb-3">
            <div class="col-md-5">
                <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Cari nama / slug...">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search me-1"></i> Cari</button>
                @if ($q)<a href="{{ route('category.index') }}" class="btn btn-link">Reset</a>@endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">Nama</th>
                        <th class="border-0">Slug</th>
                        <th class="border-0">Jumlah Post</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataCategory as $item)
                        <tr>
                            <td>{{ $dataCategory->firstItem() + $loop->index }}</td>
                            <td>{{ $item->name }}</td>
                            <td><code>{{ $item->slug }}</code></td>
                            {{-- hasil leftJoin + COUNT dari Query Builder --}}
                            <td><span class="badge bg-info text-dark">{{ $item->posts_count }}</span></td>
                            <td class="text-nowrap">
                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('category.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini? Post di kategori ini tidak akan terhapus.')">
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
                            <td colspan="5" class="text-center text-muted py-4">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $dataCategory->links() }}</div>
    </div>
</div>
@endsection
