@extends('layouts.admin.app')

@section('title', 'Edit Category')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Data Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </nav>
        <h1 class="h3 mb-0">Edit Category</h1>
        <p class="text-muted mb-0">Ubah data kategori.</p>
    </div>
    <a href="{{ route('category.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('category.update', $dataCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.category._form')
        </form>
    </div>
</div>
@endsection
