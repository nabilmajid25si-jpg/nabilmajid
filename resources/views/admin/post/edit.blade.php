@extends('layouts.admin.app')

@section('title', 'Edit Post')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Data Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
            </ol>
        </nav>
        <h1 class="h3 mb-0">Edit Post</h1>
        <p class="text-muted mb-0">Ubah data post.</p>
    </div>
    <a href="{{ route('post.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('post.update', $dataPost->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.post._form')
        </form>
    </div>
</div>
@endsection
