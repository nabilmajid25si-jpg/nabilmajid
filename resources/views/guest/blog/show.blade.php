@extends('layouts.guest.app')

@section('title', $post->title)

@section('content')
  @include('guest.partials.page-title', [
      'title' => $post->title,
      'crumbs' => ['Blog' => route('blog.index'), 'Detail' => null],
  ])

  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          @if ($post->category)
            <a href="{{ route('blog.index', ['kategori' => $post->category->slug]) }}" class="badge bg-primary text-decoration-none mb-3">{{ $post->category->name }}</a>
          @endif
          <p class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $post->created_at->format('d M Y') }}</p>
          <div style="white-space: pre-line">{{ $post->content }}</div>
          <a href="{{ route('blog.index') }}" class="btn btn-outline-primary mt-4">&larr; Kembali ke Blog</a>
        </div>
      </div>
    </div>
  </section>
@endsection
