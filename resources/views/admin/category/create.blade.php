@extends('layouts.admin.app')

@section('title', 'Tambah Category')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Data Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Category</li>
            </ol>
        </nav>
        <h1 class="h3 mb-0">Tambah Category</h1>
        <p class="text-muted mb-0">CRUD 2 &mdash; diproses dengan Query Builder.</p>
    </div>
    <a href="{{ route('category.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            @include('admin.category._form')
        </form>
    </div>
</div>
@endsection
