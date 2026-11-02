@extends('layouts.guest.app')

@section('title', 'Blog')

@section('content')
  {{-- Partial: judul halaman --}}
  @include('guest.partials.page-title', [
      'title' => 'Blog',
      'subtitle' => 'Data dari 2 CRUD: Post (Eloquent) & Category (Query Builder)',
      'crumbs' => ['Blog' => null],
  ])

  <section class="section">
    <div class="container">
      <div class="row gy-4">

        {{-- Kolom kiri: daftar Post (Eloquent) --}}
        <div class="col-lg-8">
          <div class="row gy-4">
            @forelse ($posts as $post)
              {{-- Partial: kartu post --}}
              @include('guest.blog.partials.post-card', ['post' => $post])
            @empty
              <div class="col-12"><div class="alert alert-info mb-0">Belum ada post untuk ditampilkan.</div></div>
            @endforelse
          </div>

          <div class="mt-4">{{ $posts->links() }}</div>
          <p class="small text-muted mt-2 mb-0"><i class="bi bi-database me-1"></i>Data: Eloquent ORM</p>
        </div>

        {{-- Kolom kanan: daftar Category (Query Builder) --}}
        <aside class="col-lg-4">
          {{-- Partial: daftar kategori --}}
          @include('guest.blog.partials.category-list', ['categories' => $categories, 'activeSlug' => $activeSlug])
        </aside>

      </div>
    </div>
  </section>
@endsection
