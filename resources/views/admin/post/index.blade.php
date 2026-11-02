@extends('layouts.admin.app')

@section('title', 'Data Post')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="h3 mb-0">Data Post</h1>
        <p class="text-muted mb-0">CRUD 1 &mdash; <span class="badge bg-primary">Eloquent ORM</span></p>
    </div>
    <a href="{{ route('post.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah Post</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="GET" action="{{ route('post.index') }}" class="row g-2 mb-3">
            <div class="col-md-5">
                <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Cari judul / isi...">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search me-1"></i> Cari</button>
                @if ($q)<a href="{{ route('post.index') }}" class="btn btn-link">Reset</a>@endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">Judul Post</th>
                        <th class="border-0">Kategori</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataPost as $item)
                        <tr>
                            <td>{{ $dataPost->firstItem() + $loop->index }}</td>
                            <td>{{ $item->title }}</td>
                            {{-- relasi Eloquent: $item->category (belongsTo) --}}
                            <td>{{ $item->category->name ?? '-' }}</td>
                            <td><span class="badge {{ $item->status === 'Published' ? 'bg-success' : 'bg-secondary' }}">{{ $item->status }}</span></td>
                            <td class="text-nowrap">
                                <a href="{{ route('post.edit', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('post.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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

        <div class="mt-3">{{ $dataPost->links() }}</div>
    </div>
</div>
@endsection
