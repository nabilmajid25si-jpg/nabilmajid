@extends('layouts.admin.app')

@section('title', 'Tambah Pembelian')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('purchase.index') }}">Data Pembelian</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Pembelian</li>
            </ol>
        </nav>
        <h1 class="h3 mb-0">Tambah Pembelian</h1>
        <p class="text-muted mb-0">CRUD 1 &mdash; diproses dengan Eloquent ORM.</p>
    </div>
    <a href="{{ route('purchase.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('purchase.store') }}" method="POST">
            @csrf
            @include('admin.purchase._form')
        </form>
    </div>
</div>
@endsection
